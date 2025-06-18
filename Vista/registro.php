<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../style.css"> <!-- Asegúrate de que la ruta del CSS sea correcta -->
</head>
<body>
    <div class="wrapper">
        <div class="form-wrapper sing-up">
            <form action="../Controlador/registro.php" method="POST"> <!-- Cambié la ruta hacia el controlador -->
                <h1>Sign up</h1>
                <div class="input-group">
                    <input type="text" name="username" required>
                    <label for="">Username</label> 
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-group">
                    <input type="email" name="email" required>
                    <label for="">Email</label> 
                </div>
                <div class="input-group">
                    <input type="password" name="password" required>
                    <label for="">Password</label> 
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <div class="remember">
                    <label><input type="checkbox" required> Yo acepto los términos y condiciones</label>
                </div> 
                <button type="submit">Sign up</button>
                <div class="signup-link">
                    <p>Ya tiene una cuenta? <a href="login.php" class="Signipbtn-link">Login</a></p> <!-- La ruta hacia login.php -->
                </div>
            </form>
        </div>
    </div>
    
    <script src="../script.js"></script> <!-- Asegúrate de que la ruta del JS sea correcta -->
</body>
</html>
