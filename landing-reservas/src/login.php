<?php
session_start();
include 'db.php'; // Ajustá el path si tu archivo está en otra carpeta

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($password, $usuario["password"])) {
        $_SESSION["usuario"] = $usuario["email"];
        header("Location: pages/turno.php");
        exit;
    } else {
        $mensaje = "Credenciales inválidas. Verificá tus datos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color:rgb(165, 165, 165);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-box {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .btn-custom {
            background-color: #221BDE;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 10px;
            width: 100%;
        }

        .btn-custom:hover {
            background-color: #1a14b0;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-volver {
            background-color: #6c757d;
            color: white;
            width: 100%;
        }

        .btn-volver:hover {
            background-color: #5a6268;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h2>Iniciar sesión</h2>

        <?php if (!empty($mensaje)): ?>
        <div class="alert alert-danger text-center">
            <?= htmlspecialchars($mensaje) ?>
        </div>
        <?php endif; ?>
        <!-- Botón para volver atrás -->
        <a href="../pages/login.html">
            <button type="button" class="btn btn-volver mt-3">Volver atrás</button>
        </a>
    </div>
</body>

</html>


