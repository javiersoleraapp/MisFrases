<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h1>Inicio de Sesión</h1>

    <!-- Formulario de inicio de sesión -->
    <form action="autenticar.php" method="post">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Iniciar Sesión</button>
    </form>

    <!-- Enlace para registrarse -->
    <p>¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a>.</p>

    <!-- Mensaje de error (si existe) -->
    <?php
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
        echo "<p class='error-message'>$error</p>";
    }
    ?>
</div>

</body>
</html>
