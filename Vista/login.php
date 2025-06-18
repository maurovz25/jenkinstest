<?php
session_start(); // Iniciar la sesión para manejar mensajes de error

// Redirigir si el usuario ya está autenticado
if (isset($_SESSION['username'])) {
    header("Location: ../vista/bienvenido.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
    <div class="wrapper">
        <div class="form-wrapper sing-in">
            <form action="../controlador/sesion.php" method="POST">
                <h1>Iniciar sesión</h1>

                <div class="input-group">
                    <input type="text" name="username" required value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                    <label for="">Nombre de usuario</label>
                </div>

                <div class="input-group">
                    <input type="password" name="password" required>
                    <label for="">Contraseña</label>
                </div>

                <!-- Mostrar mensaje de error si la contraseña es incorrecta o el usuario no existe -->
                <?php if (isset($_SESSION['error'])): ?>
                    <p style="color: red;"><?php echo htmlspecialchars($_SESSION['error']); ?></p>
                    <?php unset($_SESSION['error']); // Eliminar el mensaje de error después de mostrarlo ?>
                <?php endif; ?>

                <button type="submit">Iniciar sesión</button>
                
                <div class="signup-link">
                    <p>Aún no tienes cuenta? <a href="#" class="Signupbtn-link">Regístrate aquí</a></p>
                </div>
            </form>
        </div>

        <div class="form-wrapper sing-up">
            <form action="../controlador/registro.php" method="POST">
                <h1>Registro</h1>

                <div class="input-group">
                    <input type="text" name="username" required>
                    <label for="">Nombre de usuario</label>
                </div>

                <div class="input-group">
                    <input type="email" name="email" required>
                    <label for="">Correo electrónico</label>
                </div>

                <div class="input-group">
                    <input type="password" name="password" required>
                    <label for="">Contraseña</label>
                </div>

                <button type="submit">Registrar</button>

                <div class="signup-link">
                    <p>Ya tienes cuenta? <a href="#" class="Signipbtn-link">Inicia sesión aquí</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="../public/script.js"></script>
</body>
</html>
