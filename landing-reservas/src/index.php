<?php
session_start();
$usuario = $_SESSION['usuario'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="descripcion" content="Bienvenido a TupunTravel">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylee.css">
    <title>Proyecto programacion</title>
</head>
<body>
    <header>
        <h1 class="p-1 mt-3">LR Consultorio</h1>
        <nav class="navbar navbar-expand-sm navbar-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item rounded shadow p-1">
                <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item rounded shadow p-1">
                <a class="nav-link" href="pages/nosotros.html">Nosotros</a>
                </li>
                <li class="nav-item rounded shadow p-1">
                <a class="nav-link" href="pages/turno.php">Turnos</a>
                </li>
                <li class="nav-item rounded shadow p-1">
                <a class="nav-link" href="pages/contacto.html">Contacto</a>
                </li>
                <?php if ($usuario): ?>
                <li class="nav-item rounded shadow p-1">
                <a class="nav-link" href="logout.php">Cerrar sesión</a>
                </li>
                <?php else: ?>
                <li class="nav-item rounded shadow p-1">
                <a class="nav-link" href="pages/login.html">Iniciar sesión</a>
                </li>
                <li class="nav-item rounded shadow p-1">
                <a class="nav-link" href="pages/registro.html">Registrarse</a>
                </li>
                <?php endif; ?>
            </ul>
            </div>
        </div>
        </nav>
    </header>

    <main>
        <div class="home">
            <div class="row g-4 justify-content-around">
                <div class="col-md-5">
                <h2>¿Quiénes somos?</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, quam neque excepturi quae dolor laudantium at numquam fugiat expedita rerum labore...</p>
                </div>
                <div class="col-md-5">
                <h2>Bienvenidos</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut ab illum facilis voluptatum asperiores amet, hic nihil fugiat, aliquid suscipit...</p>
                </div>
            </div>
            <?php if ($usuario): ?>
            <div class="alert alert-success text-center mt-3">
                Bienvenido, <?= htmlspecialchars($usuario) ?> 😊
            </div>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <div class="container-fluid">
        <div class="row">
            <div class="celulares col-sm-6 p-1">
            <h4>Contactos:</h4>
            <h5>Celular: 2622######</h5>
            <h5>Mendoza, Argentina</h5>
            <h5>Dirección: Las Heras ####</h5>
            </div>
            <div class="redes col-sm-6 text-center">
            <h4>Nuestras redes:</h4>
            <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.google.com/intl/es-419/gmail/about/"><i class="fa-regular fa-envelope"></i></a>
            </div>
        </div>
        </div>
    </footer>

    <a href="#" class="subir"><i class="fa-solid fa-arrow-up"></i></a>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="./script.js"></script>
</body>
</html>
