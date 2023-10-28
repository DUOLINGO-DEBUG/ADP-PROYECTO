<!doctype html>
<html lang="ES">

<head>
    <title>BIENVENIDOS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
//Mensaje


$mensaje_sesion = isset($_GET['mensaje']) ? $_GET['mensaje'] : "";
echo " " . urldecode($mensaje_sesion) . " ";

require_once('Vista/00-utilidades/preloader.php');
?>
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="img/logo_1_00001.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            PROYECTO ADP
        </a>
        <button class="btn btn_zacamil" type="submit"><span><i class="bi bi-wrench-adjustable-circle-fill"></i></span>
            Soporte</button>
    </div>
</nav>

<body>



    <br><br>
    <section class="pt-5 pb-5 mt-2 align-items-center d-flex" style="min-height: 10px;">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center d-flex-row text-center h-100">
                <div class="col-12 col-md-4 col-lg-3 h-50">
                    <div class="card shadow">
                        <div class="card-body mx-auto">
                            <br>
                            <div class="container">
                                <img src="img/logo_1_00001.svg" width="100px" class="img-fluid" alt="...">
                            </div>
                            <h4 class="card-title mt-2 text-center">BIENVENIDO</h4>
                            <br><br>
                            <form name="login" method="POST" action="Controlador/Controlador.Sesion.php">
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                                    </div>
                                    <input name="usuario" value="" class="form-control" placeholder="Alex.Nava@zacamil.sv" type="text" required>
                                </div>
                                <br>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="bi bi-lock-fill"></i>
                                        </span>
                                    </div>
                                    <input name="password" value="" class="form-control" placeholder="********" type="password" required>
                                </div>

                                <br>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="submit" class="btn btn-primary">Iniciar sección</button>
                                    <!-- <button type="button" class="btn btn-primary">Registrar</button> -->
                                </div>
                                </br>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-8 mt-2 h-50 ">
                    <div id="carouselExampleCaptions" class="carousel slide shadow">
                        <div class="carousel-indicators">
                            <button style="background-color: #01274e;" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button style="background-color: #01274e;" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button style="background-color: #01274e;" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://placehold.co/1000x500?text=MANUALES" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="color_zacamil">Manuales ADP</h5>
                                    <!-- <a href="#" class="btn btn-dark">WAZA</a> -->
                                    <button class="btn_Zacamil" id="downloadButton">Click pls</button>
                                    <p class="color_zacamil">No olvides consultar tu manual de usuario.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://placehold.co/1000x500?text=REPORTES" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="color_zacamil">Reportes Zacamil</h5>
                                    <p class="color_zacamil">Crea tus reportes, Para hacer mantenimiento o reparaciones a los equipos.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://placehold.co/1000x500?text=USUARIOS" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="color_zacamil">Usuarios nuevos!.</h5>
                                    <p class="color_zacamil">Para la creación de cuentas consulte con el Administrador.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/animacion.js"></script>

    <script>
        document.getElementById('downloadButton').addEventListener('click', function() {
            // Realizar una solicitud HTTP al script PHP para descargar el archivo
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'descargar.php', true);
            xhr.send();
        });
    </script>
</body>

</html>