<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
}
?>


