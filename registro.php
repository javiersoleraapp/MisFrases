<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h1>Registro</h1>

    <!-- Formulario de registro -->
    <form action="registrar_usuario.php" method="post">
        <label for="new_username">Nuevo Usuario:</label>
        <input type="text" id="new_username" name="new_username" required>
        <label for="new_password">Nueva Contraseña:</label>
        <input type="password" id="new_password" name="new_password" required>
        <button type="submit">Crear cuenta</button>
    </form>

    <!-- Enlace para iniciar sesión -->
    <p>¿Ya tienes una cuenta? <a href="login.php">Inicia Sesión aquí</a>.</p>
</div>

</body>
</html>
