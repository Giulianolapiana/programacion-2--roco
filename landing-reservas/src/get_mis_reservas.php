<?php
session_start();
include 'db.php';

if (!isset($_SESSION['usuario'])) {
    echo json_encode([]);
    exit;
}

$email = $_SESSION['usuario'];

$stmt = $conn->prepare("SELECT nombre, fecha, hora FROM reservas WHERE email = ? ORDER BY fecha, hora");
$stmt->execute([$email]);
$reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($reservas);
