<?php
// Cargar frases desde el archivo
if (file_exists("_mensajes.txt")) {
    $frases = file("_mensajes.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Revertir el orden de las frases (las más recientes arriba)
    $frases = array_reverse($frases);

    // Mostrar frases
    foreach ($frases as $frase) {
        list($fecha, $contenido, $usuario, $ip) = explode(" | ", $frase, 4);

        // Si no hay usuario, mostrar como Anónimo
        $usuarioMostrar = $usuario ? $usuario : "Anónimo";

        echo "<p><strong>$fecha:</strong> $usuarioMostrar - $contenido</p>";
    }
}
?>
