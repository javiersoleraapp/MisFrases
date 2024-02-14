<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Archivos que contienen la información de usuarios y contraseñas
    $usuarios_file = "_usuarios.txt";
    $contrasenas_file = "_contrasenas.txt";

    // Verifica si el usuario existe
    if (file_exists($usuarios_file) && file_exists($contrasenas_file)) {
        $usuarios_registrados = file($usuarios_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if (in_array($username, $usuarios_registrados)) {
            // Obtiene el hash almacenado para el usuario
            $hashes = file($contrasenas_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $index = array_search($username, $usuarios_registrados);

            if ($index !== false) {
                $hash = explode(":", $hashes[$index]);
                $stored_hash = $hash[1];

                // Verifica la contraseña
                if (password_verify($password, $stored_hash)) {
                    // Inicia sesión con el usuario
                    $_SESSION['username'] = $username;

                    // Redirige a la página principal
                    header("Location: index.php");
                    exit;
                }
            }
        }
    }

    // Si las credenciales son incorrectas, redirige con un mensaje de error
    header("Location: login.php?error=Credenciales incorrectas");
    exit;
} else {
    // Si se intenta acceder directamente a este archivo sin un formulario POST, redirige a la página principal
    header("Location: index.php");
    exit;
}
?>
