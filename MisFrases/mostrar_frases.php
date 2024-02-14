<?php
$frases = file("frases.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$frases = array_reverse($frases);

foreach ($frases as $frase) {
    // Dividir la línea en fecha y contenido
    list($fecha, $contenido, $usuario) = explode(" - ", $frase.' - Anónimo');

    // Mostrar la frase con el nombre de usuario (o Anónimo)
    echo "<p>$fecha - $contenido (Usuario: $usuario)</p>";
}
?>
