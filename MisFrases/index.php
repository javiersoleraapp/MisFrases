<?php
// index.php
include("config.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Juntas sí se puede</title>
</head>
<body>

<?php include("menu.php"); ?>

<div class="content">
    <h1>Juntas sí se puede</h1>
    <!-- Formulario para publicar una frase (sin autenticación) -->
    <form action="publicar.php" method="post">
        <label for="frase">Portal libre para poner lo que quieras. Quedará visible para siempre. El autor de la página no se hace responsable de nada de lo que aquí se escriba:</label>
        <input type="text" id="frase" name="frase" required>
        <button type="submit">Publicar</button>
    </form>

    <!-- Contenedor de frases publicadas -->
    <div class="frases-container">
        <?php include 'mostrar_frases.php'; ?>
    </div>
</div>

<!-- Botón de información del usuario y cerrar sesión -->
<div class="login-button">
    <?php
    session_start();
    
    if (isset($_SESSION['username'])) {
        echo '<p>Bienvenido, ' . $_SESSION['username'] . '! <a href="cerrar_sesion.php">Cerrar Sesión</a></p>';
    } else {
        echo '<a href="login.php">Iniciar Sesión</a>';
    }
    ?>
</div>

</body>
</html>
