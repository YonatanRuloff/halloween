<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['disfraz-nombre'];
    $descripcion = $_POST['disfraz-descripcion'];
    $foto = $_FILES['disfraz-foto']['name'];

    // Subir la imagen
    $fotoPath = "uploads/" . basename($foto);
    move_uploaded_file($_FILES['disfraz-foto']['tmp_name'], $fotoPath);

    $stmt = $pdo->prepare("INSERT INTO disfraces (nombre, descripcion, votos, foto) VALUES (:nombre, :descripcion, 0, :foto)");
    $stmt->execute(['nombre' => $nombre, 'descripcion' => $descripcion, 'foto' => $fotoPath]);

    echo "Disfraz agregado correctamente.";
}
?>
