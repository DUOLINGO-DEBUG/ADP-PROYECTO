<!DOCTYPE html>
<html lang="en">

<head>
    <title>TÉCNICO</title>
    <link rel="icon" href="../../img/logo_1_000010.svg" type="image/x-icon" sizes="16x16 32x32 48x48">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- ----------------------------------------------------------------------------------------------CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <!-- ----------------------------------------------------------------------------------------------JS -->
    <script src="../../js/animacion.js"></script>
    <script src="../../js/bootstrap/bootstrap.min.js"></script>
    <script src="../../js/Jquery/jquery-3.7.1.min.js"></script>
    <script src="../../js/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="../../js/"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

</head>

<?php
$rol_usuario = 'Técnico -';
require_once('../00-utilidades/session.php');
require_once('../00-utilidades/preloader.php');
require_once('../00-utilidades/nav.php');

if (!isset($_SESSION["Id_Usuario"]) || ($_SESSION["Cargo_Cargos"] != 2)) {
    header("Location: ../../");
    exit();
} else {
    require_once('../../Controlador/ctr.encriptacion.php');
}
?>

<?php
$mensaje_sesion = isset($_GET['report']) ? $_GET['report'] : "";

if (!empty($mensaje_sesion)) {
    $idreporte = desencriptar(desencriptarURL($mensaje_sesion));

    if ($idreporte > 0) {
        $titulo_name = '';
        $Porcentaje = 0;
        $id_reporte_tec = 0;
        $Porcentaje_restante = 0;
        $fecha_reporte_tec = '';
        // ---------------------------------------------------[TIEMPO]
        require_once('../../Controlador/ctr.time.php');

        // ---------------------------------------------------[ASIGNACIONES => REPORTES]
        require_once('../../Modelo/Modelo.Asignaciones.php');
        $asignaciones = new Asignaciones();
        $tarea_tecnicos = $asignaciones->Listar_Asignaciones_id($_SESSION['Id_Usuario'], $idreporte);


        // ---------------------------------------------------[PROGRESO => REPORTES]
        require_once('../../Modelo/Modelo.Progreso.php');
        $progreso = new Progreso();
        $progresos = $progreso->Listar_Progresos_IdReporte($idreporte);


        if (is_array($progresos)) {
            foreach ($progresos as $progresos_foreach) {
                $Porcentaje = $progresos_foreach['Porcentaje_Progreso'];
                break;
            }
        }
        $Porcentaje_restante = 100 - $Porcentaje;
    } else {
        header('Location: index.php');
        exit;
    }
} else {
    header('Location: index.php');
    exit;
}

?>

<style>
    /* Estilos personalizados para el input de tipo progreso */
    .progress {
        height: 25px;
    }

    .progress-bar {
        height: 100%;
    }

    .progress-input {
        width: 50px;
        /* Ancho del input de progreso */
    }
</style>

<body>
    <br>
    <div class="container">
        <!-- Pestañas -->
        <ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active position-relative" id="tab2-tab" data-bs-toggle="tab" href="tab" role="tab" aria-controls="tab1" aria-selected="false">Progreso y Detalles del Reporte
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
            </li>
        </ul>

        <div class="tab-content bg-white" id="myTabsContent">
            <br>
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="container">
                                <hr style="background-color: #01274e;">
                                <h6 class="text-center">DETALLE DEL REPORTE</h6>
                                <div class="row">
                                    <?php
                                    if (is_array($tarea_tecnicos)) {
                                        if (count($tarea_tecnicos) > 0) {

                                            foreach ($tarea_tecnicos as $tarea_tecnicos_foreach) {
                                                $titulo_name = $tarea_tecnicos_foreach['Nombre_Equipo_Reporte'] . ' ' . $tarea_tecnicos_foreach['Marca_Reporte'];
                                                $fecha_reporte_tec = $tarea_tecnicos_foreach['Fecha_Finalizacion_Reporte'];

                                    ?>
                                                <div class="col-lg">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text icon_zacamil"><i class="bi bi-pc-display-horizontal"></i></span>
                                                        <div class="form-floating">
                                                            <input readonly type="text" value="<?php echo $tarea_tecnicos_foreach['Nombre_Equipo_Reporte']; ?>" class="form-control" id="floatingInput" name="nombre_equipo_reporte" placeholder="" maxlength="100" minlength="5" required>
                                                            <label for="floatingInput">Nombre del equipo. <b class="importante_zacamil">*</b></label>
                                                        </div>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text icon_zacamil"><i class="bi bi-amd"></i></span>
                                                        <div class="form-floating">
                                                            <input readonly value="<?php echo $tarea_tecnicos_foreach['Marca_Reporte']; ?>" type="text" class="form-control" id="floatingInput" name="marca_equipo_reporte" placeholder="" maxlength="100" minlength="5" required>
                                                            <label for="floatingInput">Marca del Equipo. <b class="importante_zacamil">*</b></label>
                                                        </div>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text icon_zacamil"><i class="bi bi-upc"></i></span>
                                                        <div class="form-floating">
                                                            <input readonly value="<?php echo $tarea_tecnicos_foreach['Modelo_Reporte']; ?>" type="text" class="form-control" id="floatingInput" name="modelo_equipo_reporte" placeholder="" maxlength="100" minlength="5" required>
                                                            <label for="floatingInput">Modelo del Equipo. <b class="importante_zacamil">*</b></label>
                                                        </div>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text icon_zacamil"><i class="bi bi-building-fill-gear"></i></span>
                                                        <div class="form-floating">
                                                            <input readonly value="<?php echo $tarea_tecnicos_foreach['Area_Reporte']; ?>" type="text" class="form-control" id="floatingInput" name="area_equipo_reporte" placeholder="" maxlength="100" minlength="5" required>
                                                            <label for="floatingInput">Área. <b class="importante_zacamil">*</b></label>
                                                        </div>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text icon_zacamil"><i class="bi bi-123"></i></span>
                                                        <div class="form-floating">
                                                            <input readonly value="<?php echo $tarea_tecnicos_foreach['Serial_Reporte']; ?>" type="text" class="form-control" id="floatingInput" name="serial_equipo_reporte" placeholder="" maxlength="100" minlength="4" required>
                                                            <label for="floatingInput">Serial. <b class="importante_zacamil">*</b></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text icon_zacamil"><i class="bi bi-body-text"></i></span>
                                                        <div class="form-floating">
                                                            <textarea readonly class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="descripcion_causante_reporte" required><?php echo $tarea_tecnicos_foreach['Descripcion_Incidente_Reporte']; ?></textarea>
                                                            <label for="floatingTextarea">Descripción del causante del daño al equipo. <b class="importante_zacamil">*</b></label>
                                                        </div>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text icon_zacamil"><i class="bi bi-body-text"></i></span>
                                                        <div class="form-floating">
                                                            <textarea readonly class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="descripcion_consecuencia_reporte" required><?php echo $tarea_tecnicos_foreach['Descripcion_Error_Reporte']; ?></textarea>
                                                            <label for="floatingTextarea">Descripción del daño que tiene el equipo. <b class="importante_zacamil">*</b></label>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text icon_zacamil"><i class="bi bi-body-text"></i></span>
                                                        <div class="form-floating">
                                                            <textarea required class="form-control" placeholder="Leave a comment here" id="anexo_id" name="anexo_reporte"><?php echo $tarea_tecnicos_foreach['Anexo_Reporte']; ?></textarea>
                                                            <label for="floatingTextarea">Anexo.</label>
                                                        </div>
                                                    </div>
                                                </div>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="container">
                                <div class="container">
                                    <hr style="background-color: #01274e;">
                                    <h6 class="text-center">PROGRESO</h6>
                                    <div class="row">
                                        <div class="col-lg">
                                            <div>
                                                <canvas id="doughnutChart"></canvas>
                                            </div>
                                        </div>
                                        <?php
                                        if ($Porcentaje == 100) {

                                        ?>
                                            <div class="col-lg text-center d-grid gap-2">
                                                <hr style="background-color: #01274e;">

                                                <?php
                                                if (strlen($fecha_reporte_tec) > 6) {
                                                ?>
                                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#agregar" disabled><i class="bi bi-terminal-plus"></i> AGREGAR PROGRESO</button>
                                                    <a href="index.php" class="btn btn_zacamil btn-sm"><i class="bi bi-arrow-left-circle-fill"></i> ELEGIR OTRO REPORTE</a>
                                                    <a href="index.php" class="btn btn-success btn-sm"><i class="bi bi-arrow-left-circle-fill"></i> REPORTE FINALIZADO</a>
                                                <?php
                                                } else {
                                                ?>

                                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#agregar" disabled><i class="bi bi-terminal-plus"></i> AGREGAR PROGRESO</button>
                                                    <a href="index.php" class="btn btn_zacamil btn-sm"><i class="bi bi-arrow-left-circle-fill"></i> ELEGIR OTRO REPORTE</a>
                                                    <a href="../../Controlador/ctr.progreso.php?progreso=<?php echo encriptar($idreporte) ?>" class="btn btn-warning btn-sm"><i class="bi bi-arrow-left-circle-fill"></i> FINALIZAR REPORTE</a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        <?php

                                        } else {
                                        ?>
                                            <div class="col-lg text-center d-grid gap-2">
                                                <hr style="background-color: #01274e;">
                                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#agregar"><i class="bi bi-terminal-plus"></i> AGREGAR PROGRESO</button>
                                                <a href="index.php" class="btn btn_zacamil btn-sm"><i class="bi bi-arrow-left-circle-fill"></i> ELEGIR OTRO REPORTE</a>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <div>
                                            <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="agregacion" aria-hidden="true">
                                                <div class="modal-dialog bg-white" role="document">
                                                    <form class="modal-content" action="../../Controlador/ctr.progreso.php" method="post" `name="RegistrarProgreso">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="agregacion"><img src="../../img/logo_1_00001.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> AGREGANDO PROGRESO</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="modal-body">
                                                                <input type="hidden" id="id_reporte_progreso" name="id_reporte_progreso" value="<?php echo encriptar($idreporte); ?>">
                                                                <input type="hidden" id="fecha_progreso" name="fecha_progreso" value="<?php echo Obtner_Fecha_sv() . ' ' . Obtener_Hora_sv(); ?>">

                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text icon_zacamil"><i class="bi bi-pc-display-horizontal"></i></span>
                                                                    <div class="form-floating">
                                                                        <input type="text" value="" class="form-control" id="floatingInput" name="titulo_progreso" placeholder="" maxlength="100" minlength="5" required>
                                                                        <label for="floatingInput">Título del Progreso<b class="importante_zacamil">*</b></label>
                                                                    </div>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text icon_zacamil"><i class="bi bi-body-text"></i></span>
                                                                    <div class="form-floating">
                                                                        <textarea class="form-control" placeholder="" id="floatingTextarea" name="descripcion_progreso" required></textarea>
                                                                        <label for="floatingTextarea">Descripción del progreso realizado. <b class="importante_zacamil">*</b></label>
                                                                    </div>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text icon_zacamil"><i class="bi bi-percent"></i></span>
                                                                    <div class="form-floating">
                                                                        <label for="floatingTextarea">Indica el % del avance del proyecto. <b class="importante_zacamil">*</b></label>
                                                                    </div>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <span id="rango_label" class="input-group-text icon_zacamil"><?php echo $Porcentaje ?><i class="bi bi-percent"></i></span>
                                                                    <div class="form-floating">
                                                                        <input type="range" name="porcentaje_progreso" id="customRange1" class="form-range" min="<?php echo $Porcentaje ?>" max="100" values="<?php echo $Porcentaje ?>" require>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cancelar</button>
                                                                <button type="submit" id="btnregistrar" name="RegistrarProgreso" class="btn btn-success btn-sm"><i class="bi bi-check2-circle"></i> Agregar Avance</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!--  -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="container">
                                <hr>
                                <h6 class="text-center">HISTORIAL PROGRESOS</h6>
                                <div class="progress" role="progressbar" aria-label="Success striped example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar progress-bar-striped bg-success" style="width: <?php echo $Porcentaje; ?>%">[<?php echo $Porcentaje . '% ' . $titulo_name ?>]</div>
                                </div>
                                <p></p>
                                <table id="tecnico" class="display">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Reporte</th>
                                            <th>Titulo Progreso</th>
                                            <th>Descripcion Progreso</th>
                                            <th>Porcentaje</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        <?php
                                        $tareas_tecnicos_count = 0;
                                        if (is_array($progresos)) {

                                            $tareas_tecnicos_count = count($progresos);
                                            $id_table = 1;
                                            foreach ($progresos as $progresos_foreach) {
                                        ?>
                                                <tr>
                                                    <td><i class="bi bi-code-slash"></i> <?php echo $id_table; ?></td>
                                                    <td><?php echo $titulo_name ?></td>
                                                    <td><?php echo $progresos_foreach['Titulo_Progreso']; ?></td>
                                                    <td><?php echo $progresos_foreach['Descripcion_Progreso'] ?></td>
                                                    <td>
                                                        <p class="btn btn-success btn-sm btn-striped"><?php echo $progresos_foreach['Porcentaje_Progreso'] . '<i class="bi bi-percent"></i>'; ?></p>
                                                    </td>
                                                    <td><?php echo formatearFecha($progresos_foreach['Fecha_Progreso']); ?></td>
                                                </tr>
                                            <?php
                                                $id_table++;
                                            }
                                        }
                                        if ($tareas_tecnicos_count == 0) {
                                            ?>
                                            <tr>
                                                <td>----</td>
                                                <td>----</td>
                                                <td>----</td>
                                                <td>----</td>
                                                <td>----</td>
                                                <td>----</td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Datos del gráfico donuas
        var data = {
            labels: ['<?php echo $Porcentaje ?>%', '<?php echo $Porcentaje_restante ?>%'],
            datasets: [{
                data: [<?php echo $Porcentaje ?>, <?php echo $Porcentaje_restante ?>],
                backgroundColor: ['#198754', '#313945'],
            }]
        };

        var ctx = document.getElementById('doughnutChart').getContext('2d');

        // Crea el gráfico Doughnut
        var doughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: {
                responsive: true
            },
        });
        // ------------------------------------------------------------------
    </script>
    <script>
        new DataTable('#tecnico', {
            paging: false,
            scrollCollapse: true,
            scrollY: '50vh',
            language: {
                "search": "Buscar Reporte:",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ reportes"
            }
        });
    </script>
    <script>
        document.getElementById('customRange1').addEventListener('input', function() {
            var rangeValue = document.getElementById('customRange1').value;
            document.getElementById('rango_label').textContent = rangeValue + '%';
        });
    </script>
</body>