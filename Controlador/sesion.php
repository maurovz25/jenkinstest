<?php
// Incluir el archivo de conexión
require_once '../Modelo/conexion.php'; // Ajusta la ruta si es necesario

// Iniciar sesión para manejar mensajes de error y mostrarlo en la página
session_start();

// Crear una nueva instancia de la conexión
$conexion = new Conexion();
$conn = $conexion->getConnection();

// Capturar los datos del formulario de login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consultar si el usuario existe
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE username = ?");
    $stmt->bindParam(1, $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener el resultado como un array asociativo

    if ($user) {
        // Verificar la contraseña
        if (password_verify($password, $user['password'])) {
            // Si la contraseña es correcta, iniciar la sesión
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];

            // Redirigir a la página de bienvenida
            header("Location: ../vista/bienvenido.php");
            exit();
        } else {
            // Si la contraseña es incorrecta, guardar el mensaje de error
            $_SESSION['error'] = "Contraseña incorrecta";
        }
    } else {
        // Si el usuario no existe, guardar el mensaje de error
        $_SESSION['error'] = "Usuario no encontrado";
    }

    // Cerrar el cursor de la consulta
    $stmt->closeCursor();

    // Redirigir de vuelta al formulario de inicio de sesión para mostrar el error
    header("Location: ../vista/login.php");
    exit();
}
?>
