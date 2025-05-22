<?php
include 'db.php';

$fecha = $_GET['fecha'] ?? null;

if (!$fecha) {
    echo json_encode([]);
    exit;
}

$stmt = $conn->prepare("SELECT hora FROM reservas WHERE fecha = ?");
$stmt->execute([$fecha]);
$horas = $stmt->fetchAll(PDO::FETCH_COLUMN);

echo json_encode($horas);


/* include 'db.php';

if (isset($_GET['fecha'])) {
    $fecha = $_GET['fecha'];

    $stmt = $conn->prepare("SELECT hora FROM reservas WHERE fecha = ?");
    $stmt->execute([$fecha]);

    $horas = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo json_encode($horas);
} else {
    echo json_encode([]);
}
?> */

