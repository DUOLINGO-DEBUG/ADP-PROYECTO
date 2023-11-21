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

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <style>
        /* div.dataTables_wrapper {
            width: 1000px;
            margin: 0 auto;
        } */
    </style>
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
    // include('../../Modelo/Modelo.usuarios.php');
    // $usuario = new Usuario();
    // $usuarios = $usuario->Listar_Usuarios();

    include('../../Modelo/Modelo.Asignaciones.php');
    $asignaciones = new Asignaciones();
    $tarea_tecnicos = $asignaciones->Listar_Asignaciones_tecnico($_SESSION['Id_Usuario']);

    include('../../Modelo/Modelo.usuarios.php');
    $usuario = new Usuario();
    $tecnicos = $usuario->Listar_Tecnicos_Random();
}

?>

<body>
    <br>
    <div class="container">
        <!-- Pestañas -->
        <ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active position-relative" id="tab2-tab" data-bs-toggle="tab" href="tab" role="tab" aria-controls="tab1" aria-selected="false">Listado de Reportes
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                        <?php if (is_array($tarea_tecnicos)) {
                            echo count($tarea_tecnicos);
                        } else {
                            echo '0';
                        } ?>
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
            </li>
        </ul>


        <!-- Contenido de las pestañas -->
        <div class="tab-content bg-white" id="myTabsContent">

            <br>
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                <div class="container">
                    <table id="tecnico" class="display">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Área</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Estado</th>
                                <th>Progreso</th>
                                <th>Detalles</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $tareas_tecnicos_count = 0;
                            if (is_array($tarea_tecnicos)) {

                                $tareas_tecnicos_count = count($tarea_tecnicos);
                                $id_table = 1;
                                foreach ($tarea_tecnicos as $tarea_tecnicos_foreach) {
                            ?>
                                    <tr>
                                        <td><?php echo $id_table; ?></td>
                                        <td><?php echo $tarea_tecnicos_foreach['Nombre_Equipo_Reporte']; ?></td>
                                        <td><?php echo $tarea_tecnicos_foreach['Area_Reporte']; ?></td>
                                        <td><?php echo $tarea_tecnicos_foreach['Marca_Reporte']; ?></td>
                                        <td><?php echo $tarea_tecnicos_foreach['Modelo_Reporte']; ?></td>
                                        <?php
                                        if (strlen($tarea_tecnicos_foreach['Fecha_Finalizacion_Reporte']) > 6) {
                                        ?>
                                            <td><i class="bi bi-square-fill text-success"></i></td>
                                            <td><a href="reporte.php?report=<?php echo encriptar($tarea_tecnicos_foreach['Id_Reporte']); ?>" class="btn btn-success btn-sm" id="<?php echo encriptar($tarea_tecnicos_foreach['Id_Reporte']); ?>"><i class="bi bi-pie-chart-fill"></i> VER PROGRESO</a></td>

                                        <?php
                                        } else {
                                        ?>
                                            <td><i class="bi bi-square-fill text-warning"></i></td>
                                            <td><a href="reporte.php?report=<?php echo encriptar($tarea_tecnicos_foreach['Id_Reporte']); ?>" class="btn btn-warning btn-sm" id="<?php echo encriptar($tarea_tecnicos_foreach['Id_Reporte']); ?>"><i class="bi bi-pie-chart-fill"></i> VER PROGRESO</a></td>

                                        <?php
                                        }
                                        ?>
                                        <td><button type="button" class="btn btn_zacamil btn-sm" data-bs-toggle="modal" data-bs-target="#rpr<?php echo $tarea_tecnicos_foreach['Id_Reporte']; ?>"><i class="bi bi-card-checklist"></i> DETALLES</button></td>
                                    </tr>


                                    <div class="modal fade" id="rpr<?php echo $tarea_tecnicos_foreach['Id_Reporte']; ?>" tabindex="-1" role="dialog" aria-labelledby="rpra<?php echo $tarea_tecnicos_foreach['Id_Reporte']; ?>" aria-hidden="true">
                                        <div class="modal-dialog bg-white" role="document">
                                            <!-- <h5 class="modal-title" id="rpra<?php //echo $tarea_tecnicos_foreach['Id_Reporte']; 
                                                                                    ?>">Detalles de Usuario</h5> -->
                                            <form class="modal-content" action="../../Controlador/ctr.ofertas.php" method="post" `name="RegistroOferta">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="rpra<?php echo $tarea_tecnicos_foreach['Id_Reporte']; ?>"><img src="../../img/logo_1_00001.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> DETALLES REPORTE</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="modal-body">


                                                        <input type="hidden" name="tipo_form" value="1">

                                                        <input type="hidden" name="id_usuario_reporte" value="<?php echo encriptar($tarea_tecnicos_foreach['Id_Reporte']); ?>">

                                                        <input type="hidden" name="id_usuario_Admin" value="<?php echo encriptar($_SESSION['Id_Usuario']); ?>">

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

                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text icon_zacamil"><i class="bi bi-body-text"></i></span>
                                                            <div class="form-floating">
                                                                <textarea  style="height: 100px;" readonly class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="descripcion_causante_reporte" required><?php echo $tarea_tecnicos_foreach['Descripcion_Incidente_Reporte']; ?></textarea>
                                                                <label for="floatingTextarea">Descripción del causante del daño al equipo. <b class="importante_zacamil">*</b></label>
                                                            </div>
                                                        </div>

                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text icon_zacamil"><i class="bi bi-body-text"></i></span>
                                                            <div class="form-floating">
                                                                <textarea  style="height: 100px;" readonly class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="descripcion_consecuencia_reporte" required><?php echo $tarea_tecnicos_foreach['Descripcion_Error_Reporte']; ?></textarea>
                                                                <label for="floatingTextarea">Descripción del daño que tiene el equipo. <b class="importante_zacamil">*</b></label>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text icon_zacamil"><i class="bi bi-body-text"></i></span>
                                                            <div class="form-floating">
                                                                <textarea style="height: 100px;" required class="form-control" placeholder="Leave a comment here" id="anexo_id" name="anexo_reporte"><?php echo $tarea_tecnicos_foreach['Anexo_Reporte']; ?></textarea>
                                                                <label for="floatingTextarea">Anexo.</label>
                                                            </div>
                                                        </div>



                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cancelar</button>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
            <!-- ---------------------------------------------------------------------------- -->
            <!-- REPORTES LISTA -->
            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
            </div>
            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
            </div>
        </div>
    </div>

    <script>
        // $(document).ready(function() {
        //     $('#tecnico').DataTable();

        // });

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

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>