<?php
// config.php

$hostname = "db5013420150.hosting-data.io";
$username = "dbu1585943";
$password = "BaseSolera_BB2023";
$database = "dbs11249217";

// Obt�n la direcci�n IP del usuario
$ip = $_SERVER["REMOTE_ADDR"];

$conexion = new mysqli($hostname, $username, $password, $database);

// Verifica la conexi�n
if ($conexion->connect_error) {
    die("Error de conexi�n a la base de datos: " . $conexion->connect_error);
}
?>
