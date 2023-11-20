<!DOCTYPE html>
<html lang="en">

<head>
    <title>JEFES DE ÁREA</title>
    <link rel="icon" href="../../img/logo_1_000010.svg" type="image/x-icon" sizes="16x16 32x32 48x48">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- ----------------------------------------------------------------------------------------------CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">

    <!-- ----------------------------------------------------------------------------------------------JS -->
    <script src="../../js/animacion.js"></script>
    <script src="../../js/bootstrap/bootstrap.min.js"></script>
    <script src="../../js/Jquery/jquery-3.7.1.min.js"></script>
    <script src="../../js/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="../../js/"></script>
</head>

<?php
$rol_usuario = 'Jefe de Área -';
require_once('../00-utilidades/session.php');
require_once('../00-utilidades/preloader.php');
require_once('../00-utilidades/nav.php');

if (!isset($_SESSION["Id_Usuario"]) || ($_SESSION["Cargo_Cargos"] != 1)) {
    header("Location: ../../");
    exit();
} else {
    require_once('../../Controlador/ctr.encriptacion.php');
    include('../../Modelo/Modelo.reportes.php');
    $reporte = new Reporte();
    $reportes = $reporte->Listar_Reportes_id($_SESSION["Id_Usuario"]);
}
?>

<body>
    <br>
    <div class="container">
        <!-- Pestañas -->
        <ul class="nav nav-tabs" id="myTabs" role="tablist">
            <!-- <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Mis Reportes</a>
            </li> -->
            <li class="nav-item" role="presentation">
                <a class="nav-link active position-relative" id="tab2-tab" data-bs-toggle="tab" href="tab" role="tab" aria-controls="tab2" aria-selected="false">
                    Reportes de <b><?php echo  $_SESSION['Usuario_Usuario']; ?></b>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                        <?php if (is_array($reportes)) {
                            echo count($reportes);
                        } else {
                            echo '0';
                        } ?>
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
            </li>
        </ul>


        <div class="tab-content bg-white" id="myTabsContent">

            <ol class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Necesitas información?</div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-success btn-sm" data-bs-toggle="toast" data-bs-autohide="true" id="successBtnreport"><i class="bi bi-dice-1-fill"></i> Presióname</button>
                                </div>
                                <div class="col">
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="toast" data-bs-autohide="true" id="dangerBtnreport"><i class="bi bi-dice-2-fill"></i> Presióname</button>
                                </div>
                                <div class="col">
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="toast" data-bs-autohide="true" id="warningBtnreport"><i class="bi bi-dice-3-fill"></i> Presióname</button>
                                </div>
                                <div class="col">
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="toast" data-bs-autohide="true" id="primaryBtnreport"><i class="bi bi-dice-4-fill"></i> Presióname</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="badge bg-primary rounded-pill"><i class="bi bi-dice-6-fill"></i></span>
                </li>
            </ol>

            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
                <div class="toast" role="alert" data-bs-autohide="true" id="successToastreport" data-bs-delay="9000">
                    <div class="toast-header text-success">
                        <strong class="me-auto"><i class="bi bi-cone-striped"></i> REPORTES FINALIZADOS</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
                    </div>
                    <div class="toast-body">
                        Si en el reporte se muestra el siguiente símbolo <i class="bi bi-square-fill text-success"></i>
                        significa que el reporte ya ha sido <b>finalizado.</b>

                    </div>
                </div>

                <div class="toast" role="alert" data-bs-autohide="true" id="dangerToastreport" data-bs-delay="9000">
                    <div class="toast-header text-danger">
                        <strong class="me-auto"><i class="bi bi-cone-striped"></i> REPORTES DESACTIVADOS</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
                    </div>
                    <div class="toast-body">
                        Si en el reporte se muestra el siguiente símbolo <i class="bi bi-square-fill text-danger"></i>
                        significa que el reporte ya ha sido <b>rechazado.</b>
                    </div>
                </div>

                <div class="toast" role="alert" data-bs-autohide="true" id="warningToastreport" data-bs-delay="9000">
                    <div class="toast-header text-warning">
                        <strong class="me-auto"><i class="bi bi-cone-striped"></i> REPORTES EN PROGRESO</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
                    </div>
                    <div class="toast-body">
                        Si en el reporte se muestra el siguiente símbolo <i class="bi bi-square-fill text-warning"></i>
                        significa que el reporte ya ha sido <b>aceptado</b> y <b>asignado.</b>
                    </div>
                </div>

                <div class="toast" role="alert" data-bs-autohide="true" id="primaryToastreport" data-bs-delay="9000">
                    <div class="toast-header text-primary">
                        <strong class="me-auto"><i class="bi bi-cone-striped"></i> REPORTES EN NUEVOS</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
                    </div>
                    <div class="toast-body">
                        Si en el reporte se muestra el siguiente símbolo <i class="bi bi-square-fill text-primary"></i>
                        significa que el reporte debe ser aceptado o rechazado.
                        <hr>
                        Para aceptar o rechazar un reporte debe presionar el botón
                        <span class="btn btn_zacamil btn-sm">Detalles</span>
                        y se mostrará detalles del reporte y a la vez opciones para aceptar o rechazar el reporte.
                    </div>
                </div>
            </div>

            <div class="principal">
                <!-- --------------------------------------------------------------------------------------------- -->
                <!-- [Agregar] -->
                <div class="columna m-2">
                    <div class="card card card_pc">
                        <i class="bi bi-square-fill" style="position: absolute; top: 0; left: 0; color: dark;"></i>
                        <div class="card-body placeholder-glow">
                            <p class="color_zacamil"><b>¿Agregar un Reporte?</b></p>
                            <span class="placeholder col-6"></span>
                            <span class="placeholder col-4"></span>
                            <span class="placeholder col-2"></span>
                            <span class="placeholder col-9"></span>
                            <span class="placeholder col-12"></span>


                        </div>
                        <ul class="list-group list-group-flush text_correo placeholder-glow">

                            <li class="list-group-item"><i class="bi bi-people-fill"></i> <span class="placeholder col-10"></span></li>
                            <li class="list-group-item"><i class="bi bi-pc-horizontal"></i> <span class="placeholder col-10"></span></li>
                            <li class="list-group-item"><i class="bi bi-building-down"></i> <span class="placeholder col-10"></span></li>
                        </ul>

                        <div class="card-body text-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="d-grid gap-2">
                                            <button type="button" class="btn btn_zacamil btn-sm" data-bs-toggle="modal" data-bs-target="#rpr666">AGREGAR REPORTE</button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal fade" id="rpr666" tabindex="-1" aria-labelledby="rprs666" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form class="modal-content" action="../../Controlador/ctr.ofertas.php" method="post" `name="RegistroOferta">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel"><img src="../../img/logo_1_00001.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> AGREGAR REPORTE</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-body">

                                    <input type="hidden" name="tipo_form" value="0">

                                    <input type="hidden" name="JefeArea" value="1">

                                    <input type="hidden" name="id_usuario_reporte" value="<?php echo encriptar($_SESSION['Id_Usuario']); ?>">

                                    <div class="input-group mb-3">
                                        <span class="input-group-text icon_zacamil"><i class="bi bi-pc-display-horizontal"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingInput" name="nombre_equipo_reporte" placeholder="" maxlength="100" minlength="5" required>
                                            <label for="floatingInput">Nombre del equipo. <b class="importante_zacamil">*</b></label>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text icon_zacamil"><i class="bi bi-amd"></i></span>
                                        <div class="form-floating">
                                            <input value="" type="text" class="form-control" id="floatingInput" name="marca_equipo_reporte" placeholder="" maxlength="100" minlength="5" required>
                                            <label for="floatingInput">Marca del Equipo. <b class="importante_zacamil">*</b></label>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text icon_zacamil"><i class="bi bi-upc"></i></span>
                                        <div class="form-floating">
                                            <input value="" type="text" class="form-control" id="floatingInput" name="modelo_equipo_reporte" placeholder="" maxlength="100" minlength="5" required>
                                            <label for="floatingInput">Modelo del Equipo. <b class="importante_zacamil">*</b></label>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text icon_zacamil"><i class="bi bi-building-fill-gear"></i></span>
                                        <div class="form-floating">
                                            <input value="" type="text" class="form-control" id="floatingInput" name="area_equipo_reporte" placeholder="" maxlength="100" minlength="5" required>
                                            <label for="floatingInput">Área. <b class="importante_zacamil">*</b></label>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text icon_zacamil"><i class="bi bi-123"></i></span>
                                        <div class="form-floating">
                                            <input value="" type="text" class="form-control" id="floatingInput" name="serial_equipo_reporte" placeholder="" maxlength="100" minlength="4" required>
                                            <label for="floatingInput">Serial. <b class="importante_zacamil">*</b></label>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text icon_zacamil"><i class="bi bi-body-text"></i></span>
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="descripcion_causante_reporte" required></textarea>
                                            <label for="floatingTextarea">Descripción del causante del daño al equipo. <b class="importante_zacamil">*</b></label>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text icon_zacamil"><i class="bi bi-body-text"></i></span>
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="descripcion_consecuencia_reporte" required></textarea>
                                            <label for="floatingTextarea">Descripción del daño que tiene el equipo. <b class="importante_zacamil">*</b></label>
                                        </div>
                                    </div>

                                    <!-- <div class="input-group mb-3">
                                            <span class="input-group-text icon_zacamil"><i class="bi bi-body-text"></i></span>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="anexo_reporte" ></textarea>
                                                <label for="floatingTextarea">Anexo.</label>
                                            </div>
                                        </div> -->

                                    <!-- <div class="input-group mb-3">
                                            <span class="input-group-text icon_zacamil"><i class="bi bi-person-lines-fill"></i></span>
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelectDisabled" name="rol" aria-label="Floating label" required="">
                                                

                                                </select>
                                                <label for="floatingSelectDisabled">Seleccionar Ténico.</label>
                                            </div>
                                        </div> -->

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cancelar</button>
                                    <button type="submit" id="btnregistrar" name="RegistroOferta" class="btn btn-success btn-sm"><i class="bi bi-check2-circle"></i> Agregar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                if (is_array($reportes)) {
                    $numero_arreglo = count($reportes);
                    // var_dump($usuarios);
                    foreach ($reportes as $reportes_card) {
                        $color_estado = 0;
                        switch ($reportes_card['Estado_Reporte']) {
                            case 1:
                                $color_estado = '#198754';
                                break;
                            case 2:
                                $color_estado = '#dc3545';
                                break;
                            case 3:
                                $color_estado = '#ffc107';
                                break;
                            case 3:
                                $color_estado = '#0d6efd';
                                break;
                            case 4:
                                $color_estado = '#0d6efd';
                                break;
                            default:
                                $color_estado = 'dark';
                                break;
                        }
                ?>
                        <div class="columna m-2">
                            <div class="card card card_pc">
                                <i class="bi bi-square-fill" style="position: absolute; top: 0; left: 0; color: <?php echo $color_estado ?>;"></i>
                                <div class="card-body">
                                    <p><b><?php echo $reportes_card['Nombre_Equipo_Reporte'] ?></b></p>
                                    <p><?php echo substr($reportes_card['Descripcion_Incidente_Reporte'], 0, 30); ?>...</p>
                                    <!-- <p><?php echo substr($reportes_card['Descripcion_Error_Reporte'], 0, 30); ?>...</p> -->

                                </div>
                                <ul class="list-group list-group-flush text_correo">

                                    <li class="list-group-item"><i class="bi bi-people-fill"></i><?php echo ' ' . $reportes_card['Nombre_Usuario'] . ' ' . $reportes_card['Apellido_Usuario']; ?></li>
                                    <li class="list-group-item"><i class="bi bi-pc-horizontal"></i><?php echo ' ' . $reportes_card['Marca_Reporte']; ?></li>
                                    <li class="list-group-item"><i class="bi bi-building-down"></i><?php echo ' ' . $reportes_card['Area_Reporte']; ?></li>
                                </ul>

                                <div class="card-body text-center">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <div class="d-grid gap-2">
                                                    <button type="button" class="btn btn_zacamil btn-sm" data-bs-toggle="modal" data-bs-target="#rpr<?php echo $reportes_card['Id_Reporte']; ?>">DETALLES</button>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal fade" id="rpr<?php echo $reportes_card['Id_Reporte']; ?>" tabindex="-1" role="dialog" aria-labelledby="rpra<?php echo $reportes_card['Id_Reporte']; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <!-- <h5 class="modal-title" id="rpra<?php //echo $reportes_card['Id_Reporte']; 
                                                                        ?>">Detalles de Usuario</h5> -->
                                <form class="modal-content" action="../../Controlador/ctr.ofertas.php" method="post" `name="RegistroOferta">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="rpra<?php echo $reportes_card['Id_Reporte']; ?>"><img src="../../img/logo_1_00001.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> DETALLES REPORTE</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-body">


                                            <input type="hidden" name="tipo_form" value="1">

                                            <input type="hidden" name="id_usuario_reporte" value="<?php echo encriptar($reportes_card['Id_Reporte']); ?>">

                                            <input type="hidden" name="id_usuario_Admin" value="<?php echo encriptar($_SESSION['Id_Usuario']); ?>">

                                            <div class="input-group mb-3">
                                                <span class="input-group-text icon_zacamil"><i class="bi bi-pc-display-horizontal"></i></span>
                                                <div class="form-floating">
                                                    <input readonly type="text" value="<?php echo $reportes_card['Nombre_Equipo_Reporte']; ?>" class="form-control" id="floatingInput" name="nombre_equipo_reporte" placeholder="" maxlength="100" minlength="5" required>
                                                    <label for="floatingInput">Nombre del equipo. <b class="importante_zacamil">*</b></label>
                                                </div>
                                            </div>

                                            <div class="input-group mb-3">
                                                <span class="input-group-text icon_zacamil"><i class="bi bi-amd"></i></span>
                                                <div class="form-floating">
                                                    <input readonly value="<?php echo $reportes_card['Marca_Reporte']; ?>" type="text" class="form-control" id="floatingInput" name="marca_equipo_reporte" placeholder="" maxlength="100" minlength="5" required>
                                                    <label for="floatingInput">Marca del Equipo. <b class="importante_zacamil">*</b></label>
                                                </div>
                                            </div>

                                            <div class="input-group mb-3">
                                                <span class="input-group-text icon_zacamil"><i class="bi bi-upc"></i></span>
                                                <div class="form-floating">
                                                    <input readonly value="<?php echo $reportes_card['Modelo_Reporte']; ?>" type="text" class="form-control" id="floatingInput" name="modelo_equipo_reporte" placeholder="" maxlength="100" minlength="5" required>
                                                    <label for="floatingInput">Modelo del Equipo. <b class="importante_zacamil">*</b></label>
                                                </div>
                                            </div>

                                            <div class="input-group mb-3">
                                                <span class="input-group-text icon_zacamil"><i class="bi bi-building-fill-gear"></i></span>
                                                <div class="form-floating">
                                                    <input readonly value="<?php echo $reportes_card['Area_Reporte']; ?>" type="text" class="form-control" id="floatingInput" name="area_equipo_reporte" placeholder="" maxlength="100" minlength="5" required>
                                                    <label for="floatingInput">Área. <b class="importante_zacamil">*</b></label>
                                                </div>
                                            </div>

                                            <div class="input-group mb-3">
                                                <span class="input-group-text icon_zacamil"><i class="bi bi-123"></i></span>
                                                <div class="form-floating">
                                                    <input readonly value="<?php echo $reportes_card['Serial_Reporte']; ?>" type="text" class="form-control" id="floatingInput" name="serial_equipo_reporte" placeholder="" maxlength="100" minlength="4" required>
                                                    <label for="floatingInput">Serial. <b class="importante_zacamil">*</b></label>
                                                </div>
                                            </div>

                                            <div class="input-group mb-3">
                                                <span class="input-group-text icon_zacamil"><i class="bi bi-body-text"></i></span>
                                                <div class="form-floating">
                                                    <textarea readonly class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="descripcion_causante_reporte" required><?php echo $reportes_card['Descripcion_Incidente_Reporte']; ?></textarea>
                                                    <label for="floatingTextarea">Descripción del causante del daño al equipo. <b class="importante_zacamil">*</b></label>
                                                </div>
                                            </div>

                                            <div class="input-group mb-3">
                                                <span class="input-group-text icon_zacamil"><i class="bi bi-body-text"></i></span>
                                                <div class="form-floating">
                                                    <textarea readonly class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="descripcion_consecuencia_reporte" required><?php echo $reportes_card['Descripcion_Error_Reporte']; ?></textarea>
                                                    <label for="floatingTextarea">Descripción del daño que tiene el equipo. <b class="importante_zacamil">*</b></label>
                                                </div>
                                            </div>


                                        </div>
                                        <?php
                                        if (false) {
                                        ?>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cancelar</button>
                                                <a id="btnregistrar" href="" class="btn btn-danger btn-sm"><i class="bi bi-x-circle"></i> Rechazar</a>
                                                <button type="submit" id="btnregistrar" name="RegistroOferta" class="btn btn-warning btn-sm"><i class="bi bi-check2-circle"></i> Asignar</button>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cancelar</button>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php
                    }
                }
                if ($numero_arreglo == 0) { ?>
                    <div>
                        
                        <div class="columna container-fluid h-100 d-flex align-items-center justify-content-center">
                            <div class="text-center">
                                <h6><span><i class="bi bi-box-seam-fill"></i></span> Bueno, Tal parece que no tienes reportes…, cuando registres aparecerán aquí.</h6>
                            </div>
                        </div>

                    </div>

                <?php } ?>

            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script>
    var successBtnreport = document.getElementById('successBtnreport');
    var dangerBtnreport = document.getElementById('dangerBtnreport');
    var warningBtnreport = document.getElementById('warningBtnreport');
    var primaryBtnreport = document.getElementById('primaryBtnreport');

    var successToastreport = new bootstrap.Toast(document.getElementById('successToastreport'));
    var dangerToastreport = new bootstrap.Toast(document.getElementById('dangerToastreport'));
    var warningToastreport = new bootstrap.Toast(document.getElementById('warningToastreport'));
    var primaryToastreport = new bootstrap.Toast(document.getElementById('primaryToastreport'));

    successBtnreport.addEventListener('click', function() {
        successToastreport.show();
    });

    dangerBtnreport.addEventListener('click', function() {
        dangerToastreport.show();
    });

    warningBtnreport.addEventListener('click', function() {
        warningToastreport.show();
    });

    primaryBtnreport.addEventListener('click', function() {
        primaryToastreport.show();
    });
</script>

</html>