<?php
if (!defined('APP_RUNNING')) {
    die('Acceso denegado');
}
$host = 'db:3306';
$db   = 'reservas';
$user = 'user';
$pass = 'password';
/* $host = 'localhost';
$db = 'reservas';
$user = 'root';
$pass = ''; */

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
