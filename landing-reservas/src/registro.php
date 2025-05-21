<?php
include 'db.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Verificar que no exista ya
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
$stmt->execute([$email]);
if ($stmt->rowCount() > 0) {
    echo "Este usuario ya existe. <a href='pages/registro.html'>Volver</a>";
    exit;
}

// Insertar usuario nuevo
$hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO usuarios (email, password) VALUES (?, ?)");
$stmt->execute([$email, $hash]);

echo "Registro exitoso. <a href='pages/login.html'>Iniciar sesión</a>";
?>
