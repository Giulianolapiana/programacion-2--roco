<?php
session_start();
include 'db.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
$stmt->execute([$email]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario && password_verify($password, $usuario['password'])) {
    $_SESSION['usuario'] = $usuario['email'];
    header("Location: pages/turno.php");
} else {
    echo "Credenciales inválidas. <a href='pages/login.html'>Volver</a>";
}
?>
