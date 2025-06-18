<?php
// Iniciar la sesión
session_start();

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de login
header("Location: ../vista/login.php"); // Redirigir a login.php
exit();
?>
