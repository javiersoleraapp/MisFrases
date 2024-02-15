<?php
// publicar.php
include("config.php");

// Obtén datos del formulario
$frase = $_POST['frase'];
$usuario = isset($_SESSION['username']) ? $_SESSION['username'] : "Anónimo";

// Formatea la fecha actual
$fecha = date("Y-m-d H:i:s");

// Obtén el ID del usuario (si existe)
$idUsuario = null;
if ($usuario !== "Anónimo") {
    $result = $conexion->query("SELECT id FROM jssp_usuarios WHERE username = '$usuario'");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $idUsuario = $row['id'];
    }
}

// Inserta datos en la base de datos con el prefijo jssp
$sql = "INSERT INTO jssp_mensajes (contenido, fecha_hora, usuario_id, ip) VALUES ('$frase', '$fecha', '$idUsuario', '$ip')";

if ($conexion->query($sql) === TRUE) {
    echo "Frase publicada con éxito";
} else {
    echo "Error al publicar frase: " . $conexion->error;
}

// Cierra la conexión
$conexion->close();
?>
