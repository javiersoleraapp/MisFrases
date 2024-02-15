<?php
// publicar.php
include("config.php");

// Configuración para mostrar errores (elimina estas líneas en un entorno de producción)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

// Si el usuario es anónimo, establece $idUsuario como NULL
$idUsuario = $usuario !== "Anónimo" ? $idUsuario : NULL;

// Inserta datos en la base de datos con el prefijo jssp
$sql = "INSERT INTO jssp_mensajes (contenido, fecha_hora, usuario_id, ip) VALUES ('$frase', '$fecha', $idUsuario, '$ip')";

if ($conexion->query($sql) === TRUE) {
    echo "Frase publicada con éxito";
    // Redirige a la pantalla principal después del éxito
    header("Location: index.php");
    exit;
} else {
    // Muestra detalles del error
    echo "Error al publicar frase: " . $conexion->error;
    // También puedes agregar detalles adicionales, como $sql para ver la consulta exacta que causó el error
    echo "<br>Query: " . $sql;
}

// Cierra la conexión
$conexion->close();
?>
