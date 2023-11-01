<!doctype html>
<html lang="es">

<head>
    <title>ZACAMIL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- ----------------------------------------------------------------------------------------------CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- ----------------------------------------------------------------------------------------------JS -->
    <script src="js/animacion.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/Jquery/jquery-3.7.1.min.js"></script>
    <script src="js/sweetalert2/sweetalert2.all.min.js"></script>


</head>

<?php
// ----------------------------------------------PHP+
require_once('Vista/00-utilidades/preloader.php');
require_once('Controlador/ctr.encriptacion.php');

// ----------------------------------------------[]+
?>
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="img/logo_1_00001.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            PROYECTO-ADP <b style="font-size: 10px;">v1.3.4</b>
        </a>
        <button class="btn btn_zacamil btn-sm" type="submit"><span><i class="bi bi-wrench-adjustable-circle-fill"></i></span>
            Soporte.</button>
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
                            <form name="login" method="POST" action="Controlador/ctr.login.php">
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
                                    <button type="submit" class="btn btn_zacamil btn-sm"><i class="bi bi-box-arrow-right"></i> Iniciar sección</button>
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Registrar <i class="bi bi-box-arrow-in-up-right"></i></button>
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
                            <span class="carousel-control-prev-icon" style="background-color: #01274e;" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" style="background-color: #01274e;" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">REGISTRO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cancelar</button>
                    <button type="button" class="btn btn-success btn-sm"><i class="bi bi-check2-circle"></i> Registrar</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    $mensaje_sesion = isset($_GET['message']) ? $_GET['message'] : "";
    if (!empty($mensaje_sesion)) {
        $aes_private = desencriptarURL($mensaje_sesion);
        // $aes_private = '698L3Mmy6GFQgkmQJcCZ+Q==';
        $aes_public = desencriptar($aes_private);
        // echo '<h1>'. $aes_private .'</h1>';
        // echo $aes_public;
        $titulo_alert = 'Zacamil';
        $text_alert = 'Zacamil que mas se puede decir';
        $icono_alert = 'info';
        $btntxt_alert = 'Aceptar';
        $btncolor_alert = '#01274e';

        switch ($aes_public) {
            case 1:
                $titulo_alert = '¡Cuenta no encontrada!';
                $text_alert = 'Si no tiene cuenta puede crear una o verifique sus credenciales y que el correo tenga el siguiente formato: --------@zacamil.sv';
                $icono_alert = 'error';
                $btntxt_alert = 'Aceptar';
                $btncolor_alert = '#01274e';
                break;
            case 2:
                
                break;
        }
    ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: '<?php echo $titulo_alert ?>',
                    text: '<?php echo $text_alert ?>',
                    icon: '<?php echo $icono_alert ?>',
                    confirmButtonText: '<?php echo $btntxt_alert ?>', // Cambia el texto del botón de confirmación
                    confirmButtonColor: '<?php echo $btncolor_alert ?>', // Cambia el color de fondo del botón de confirmación
                });
            });
        </script>

    <?php
    }
    ?>
</body>

</html>