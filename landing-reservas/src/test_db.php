<?php
define('APP_RUNNING', true); 
require_once 'db.php';

include 'db.php';

try {
    $result = $conn->query("SELECT 1"); 
    if ($result) {
        echo "Conexión exitosa a la base de datos.";
    } else {
        echo "Error al realizar la consulta.";
    }
} catch (PDOException $e) {
    die("Error de conexión o consulta: " . $e->getMessage());
}
?>