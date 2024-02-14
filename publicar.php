<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $frase = $_POST["frase"];
    $fecha = date("Y-m-d H:i:s");

    // Obtener el nombre de usuario o establecerlo como "Anónimo" si no está autenticado
    $usuario = isset($_SESSION['username']) ? $_SESSION['username'] : "Anónimo";

    $registro = "$fecha - $frase - $usuario\n";

    // Guardar la frase en un archivo de texto
    file_put_contents("frases.txt", $registro, FILE_APPEND);
}

header("Location: index.php");
exit;
?>
