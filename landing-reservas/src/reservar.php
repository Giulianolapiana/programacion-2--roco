<?php
session_start();
include 'db.php';

if (!isset($_SESSION['usuario'])) {
    echo "Debes iniciar sesión para reservar.";
    exit;
}

$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$email = $_SESSION['usuario']; // ⚠️ Ahora se toma desde la sesión, no del formulario

// Verificar si el turno ya está reservado por cualquier usuario
$stmt = $conn->prepare("SELECT * FROM reservas WHERE fecha = ? AND hora = ?");
$stmt->execute([$fecha, $hora]);

if ($stmt->rowCount() > 0) {
    echo "Ese turno ya está ocupado.";
    exit;
}

// Insertar la reserva
$stmt = $conn->prepare("INSERT INTO reservas (nombre, email, fecha, hora) VALUES (?, ?, ?, ?)");
$stmt->execute([$nombre, $email, $fecha, $hora]);

echo "Reserva realizada con éxito.";




/* if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'db.php';

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    $check = $conn->prepare("SELECT COUNT(*) FROM reservas WHERE fecha = ? AND hora = ?");
    $check->execute([$fecha, $hora]);
    $existe = $check->fetchColumn();

    if ($existe > 0) {
        echo "Este horario ya está reservado. Elegí otro.";
    } else {
        $stmt = $conn->prepare("INSERT INTO reservas (nombre, email, fecha, hora) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nombre, $email, $fecha, $hora]);
        echo "¡Reserva realizada con éxito!";
    }
} else {
    echo "Método no permitido.";
} */



