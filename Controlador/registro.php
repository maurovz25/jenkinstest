<?php
// Incluir el archivo de conexión
require_once '../Modelo/conexion.php'; // Ajusta la ruta si es necesario

// Crear una instancia de la conexión
$conexion = new Conexion();  // Crear un nuevo objeto de la clase Conexion
$conn = $conexion->getConnection();  // Obtener la conexión PDO

// Capturar los datos del formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validar que los campos no estén vacíos
    if (!empty($username) && !empty($email) && !empty($password)) {
        
        // Verificar si el correo ya existe
        $stmt_check = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt_check->bindParam(1, $email);  // Usar bindParam para la variable email
        $stmt_check->execute();
        $result_check = $stmt_check->fetchAll(PDO::FETCH_ASSOC); // Obtener los resultados en un array asociativo

        if (count($result_check) == 0) { // Si no hay resultados (correo no registrado)
            // Cifrar la contraseña antes de almacenarla
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Preparar y ejecutar la inserción de usuario
            $stmt = $conn->prepare("INSERT INTO usuarios (username, email, password) VALUES (?, ?, ?)");
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $hashed_password);
            
            if ($stmt->execute()) {
                // Mostrar mensaje de éxito y redirigir a login con JavaScript
                echo "<script>
                        alert('Registro exitoso');
                        window.location.href = '../Vista/login.php';  // Redirigir al login
                      </script>";
                exit();
            } else {
                // Mostrar el error que devuelva PDO
                echo "Error: " . $stmt->errorInfo()[2];
            }
        } else {
            // Si el correo ya está registrado, mostrar mensaje y redirigir al login
            echo "<script>
                    alert('Este correo ya está registrado. Redirigiendo al login.');
                    window.location.href = '../Vista/login.php';  
                  </script>";
        }

        // Cerrar el cursor del statement
        $stmt_check->closeCursor();
    } else {
        echo "Por favor, completa todos los campos.";
    }
}

// Cerrar la conexión al final (si fuera necesario, PDO lo hace automáticamente)
$conexion->closeConnection();
?>
