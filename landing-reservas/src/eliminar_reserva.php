<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("DELETE FROM reservas WHERE fecha = ? AND hora = ? AND email = ?");
    $stmt->execute([$fecha, $hora, $email]);

    echo "Reserva eliminada de la base de datos.";
} else {
    echo "Método no permitido.";
}
?>
