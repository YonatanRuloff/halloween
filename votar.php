<?php
include 'conexion.php';

$data = json_decode(file_get_contents("php://input"), true);
$disfrazId = $data['disfrazId'] ?? null;

if ($disfrazId) {
    // Consulta para registrar el voto
    $stmt = $pdo->prepare("INSERT INTO votos (id_disfraz) VALUES (:disfrazId)");
    $stmt->execute(['disfrazId' => $disfrazId]);

    // Actualizar el contador de votos en la tabla disfraces
    $stmt = $pdo->prepare("UPDATE disfraces SET votos = votos + 1 WHERE id = :disfrazId");
    $stmt->execute(['disfrazId' => $disfrazId]);

    echo json_encode(['message' => '¡Gracias por tu voto!']);
} else {
    echo json_encode(['message' => 'Error al registrar el voto.']);
}
?>
