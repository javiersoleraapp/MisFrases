<?php
session_start();

// Destruye la sesión actual
session_destroy();

// Redirige a la página principal
header("Location: index.php");
exit;
?>
