<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtén la frase, la dirección IP y el usuario (si existe)
    $frase = $_POST["frase"];
    $ip = $_SERVER["REMOTE_ADDR"];
    $usuario = isset($_SESSION['username']) ? $_SESSION['username'] : "Anónimo";

    // Formatea la fecha actual
    $fecha = date("Y-m-d H:i:s");

    // Almacena la frase, la dirección IP, el usuario y la fecha en un archivo
    $mensaje = "$fecha | $frase | $usuario | $ip\n";
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
