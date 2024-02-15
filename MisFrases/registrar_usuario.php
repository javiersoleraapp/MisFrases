<?php
// Conexión a la base de datos
include("config.php");

// Verifica la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Obtén datos del formulario
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Inserta datos en la base de datos con el prefijo jssp
$sql = "INSERT INTO jssp_usuarios (username, password) VALUES ('$username', '$password')";

if ($conexion->query($sql) === TRUE) {
    echo "Usuario registrado con éxito";
} else {
    echo "Error al registrar usuario: " . $conexion->error;
}

// Cierra la conexión
$conexion->close();
?>
