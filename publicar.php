<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtén la frase y la dirección IP
    $frase = $_POST["frase"];
    $ip = $_SERVER["REMOTE_ADDR"];

    // Formatea la fecha actual
    $fecha = date("Y-m-d H:i:s");

    // Almacena la frase, la dirección IP y la fecha en un archivo
    $mensaje = "$fecha | $frase | $ip\n";
    file_put_contents("_mensajes.txt", $mensaje, FILE_APPEND);

    // Redirige a la página principal
    header("Location: index.php");
    exit;
} else {
    // Si se intenta acceder directamente a este archivo sin un formulario POST, redirige a la página principal
    header("Location: index.php");
    exit;
}
?>
