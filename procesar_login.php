<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['login-username'];
    $clave = $_POST['login-password'];

    $stmt = $pdo->prepare("SELECT id, clave FROM usuarios WHERE nombre = :nombre");
    $stmt->execute(['nombre' => $nombre]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($clave, $usuario['clave'])) {
        $_SESSION['user_id'] = $usuario['id'];
        echo "Inicio de sesión exitoso.";
    } else {
        echo "Nombre de usuario o contraseña incorrectos.";
    }
}
?>
