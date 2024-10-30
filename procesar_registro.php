<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['username'];
    $clave = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encripta la clave

    $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, clave) VALUES (:nombre, :clave)");
    $stmt->execute(['nombre' => $nombre, 'clave' => $clave]);

    echo "Registro completado. Ahora puedes iniciar sesión.";
}
?>
