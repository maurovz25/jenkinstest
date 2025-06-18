<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    // Si no ha iniciado sesión, redirigir a la página de login
    header("Location: ../vista/login.php"); // Redirigir a login.php
    exit();
}

// Capturar los datos de la sesión
$username = $_SESSION['username'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .welcome-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .welcome-box h1 {
            color: #333;
        }
        .welcome-box p {
            color: #555;
        }
        .welcome-box a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #0ef;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
        }
        .welcome-box a:hover {
            background-color: #0cd;
        }
    </style>
    <script>
        function confirmLogout() {
            if (confirm("¿Estás seguro de que quieres cerrar sesión?")) {
                window.location.href = "../controlador/logout.php"; // Redirigir a logout.php si el usuario confirma
            }
        }
    </script>
</head>
<body>
    <div class="welcome-box">
        <h1>Bienvenido, <?php echo htmlspecialchars($username); ?>!</h1>
        <p>Tu correo electrónico es: <?php echo htmlspecialchars($email); ?></p>
        <a href="#" onclick="confirmLogout()">Cerrar sesión</a>
    </div>
</body>
</html>
