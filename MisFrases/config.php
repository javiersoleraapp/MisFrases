<?php
// config.php

$hostname = "db5013420150.hosting-data.io";
$username = "dbu1585943";
$password = "BaseSolera_BB2023";
$database = "dbs11249217";

// Obtén la dirección IP del usuario
$ip = $_SERVER["REMOTE_ADDR"];

$conexion = new mysqli($hostname, $username, $password, $database);

// Verifica la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}
?>
