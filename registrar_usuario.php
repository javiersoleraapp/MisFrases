<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $new_username = $_POST["new_username"];
    $new_password = $_POST["new_password"];

    // Verifica si el usuario ya está registrado
    $usuarios_file = "_usuarios.txt";
    if (file_exists($usuarios_file)) {
        $usuarios_registrados = file($usuarios_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if (in_array($new_username, $usuarios_registrados)) {
            header("Location: registro.php?error=El usuario ya existe");
            exit;
        }
    }

    // Genera un hash de la contraseña
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Registra al nuevo usuario
    $usuarios_registrados[] = $new_username;
    file_put_contents($usuarios_file, implode("\n", $usuarios_registrados));

    // Guarda el hash de la contraseña del usuario en un archivo
    $contrasenas_file = "_contrasenas.txt";
    file_put_contents($contrasenas_file, "$new_username:$hashed_password\n", FILE_APPEND);

    // Inicia sesión con el nuevo usuario
    $_SESSION['username'] = $new_username;

    // Redirige a la página principal
    header("Location: index.php");
    exit;
} else {
    // Si se intenta acceder directamente a este archivo sin un formulario POST, redirige a la página principal
    header("Location: index.php");
    exit;
}
?>
