<?php
// mostrar_frases.php
include("config.php");

// Consulta para obtener frases con nombres de usuario con el prefijo jssp
$sql = "SELECT jssp_mensajes.fecha_hora, jssp_mensajes.contenido, jssp_usuarios.username 
        FROM jssp_mensajes 
        LEFT JOIN jssp_usuarios ON jssp_mensajes.usuario_id = jssp_usuarios.id 
        ORDER BY jssp_mensajes.fecha_hora DESC";

$result = $conexion->query($sql);

// Mostrar frases
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $fecha = $row['fecha_hora'];
        $contenido = $row['contenido'];
        $usuario = $row['username'];

        // Si no hay usuario, mostrar como Anónimo
        $usuarioMostrar = $usuario ? $usuario : "Anónimo";

        echo "<p><strong>$fecha:</strong> $usuarioMostrar - $contenido</p>";
    }
} else {
    echo "No hay frases para mostrar";
}

// Cierra la conexión
$conexion->close();
?>
