<?php include '../verificar.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- BS 5.1 inicia -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- BS 5.1 fin -->
    <link rel="stylesheet" href="../stylee.css">
    <title>Turnos</title>
</head>
<body>
    <header>
        <h1 class="p-1 mt-3">LR Consultorio</h1>
        <nav class="navbar navbar-expand-sm  navbar-dark" >
        <div class="container-fluid">
            <a class="navbar-brand " ></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item rounded shadow p-1">
                        <a class="nav-link" href="../index.php">home</a>
                    </li>
                    <li class="nav-item rounded shadow p-1">
                        <a class="nav-link" href="./nosotros.html">nosotros</a>
                    </li>
                    <li class="nav-item rounded shadow p-1">
                        <a class="nav-link" href="#">Turnos</a>
                    </li>
                    <li class="nav-item rounded shadow p-1">
                        <a class="nav-link" href="./contacto.html">contacto</a>
                    </li>
                </ul>
            </div>
        </div>
        </nav>
    <!-- navbar fin -->
    <!-- jumbotron inicia -->
    <div class="jumbotron mt-1 p-0 ">
        <h2>Reservá tu turno</h2>
    </div>
    <!-- jumbotron fin -->
    </header>
    <!-- inicio de container  -->
    <div class="fondoautomatico">
        <h3>Elegí una fecha y hora disponible para agendar tu cita.</h3>
        <form id="reservaFormulario" method="POST" action="../reservar.php">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>

            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" id="email" required>

            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" id="fecha" required>
            <!-- <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora" required> -->

            <label for="hora">Hora:</label>
            <select name="hora" id="hora" required>
                <p id="sinHorarios" style="color: red; display: none; margin-top: 10px;">No hay horarios disponibles para esta fecha.</p>
                <option value="">Seleccioná una fecha primero</option>
            </select>
            <button type="submit">Reservar</button>
        </form>

        <p id="mensaje"></p>
        <h4 class="mt-4">Tus reservas</h4>
        <ul id="listaReservas" class="list-group"></ul>

    </div>
    <!-- fin de container  -->

    <!--  -->
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="celulares col-sm-6 p-1" >
                    <h4>contactos:</h4>
                    <h5>celular: 2622######</h5>
                    <h5>mendoza, argentina</h5>
                    <h5>direccion: las heras ####</h5>
                </div>
                <!-- redes -->
                <div class="redes col-sm-6 text-center">
                    <h4>nuestras redes:</h4>
                    <a href="https://www.facebook.com/">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com/">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://www.google.com/intl/es-419/gmail/about/">
                        <i class="fa-regular fa-envelope"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <a href="#" class="subir">
        <i class="fa-solid fa-arrow-up"></i>
    </a>
    <!-- separate de JS incio -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- separate de JS fin -->
    <script src="../script.js"></script>
</body>
</html>