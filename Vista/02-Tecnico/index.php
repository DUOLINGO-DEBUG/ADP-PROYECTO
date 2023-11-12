<!DOCTYPE html>
<html lang="en">

<head>
    <title>Técnico</title>
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

if (!isset($_SESSION["Id_Usuario"])) {
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
}

?>

<body>
    <br>
    <div class="container">
        <!-- Pestañas -->
        <ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active position-relative" id="tab2-tab" data-bs-toggle="tab" href="tab" role="tab" aria-controls="tab1" aria-selected="false">Listado de Reportes
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
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
                                        <td><i class="bi bi-square-fill"></i></td>
                                        <td><button class="btn btn_zacamil" id="<?php echo encriptar($tarea_tecnicos_foreach['Id_Reporte']); ?>"><i class="bi bi-lock-fill"></i> Ver Progreso</button></td>
                                    </tr>
                                <?php
                                    $id_table++;
                                }
                            }
                            if ($tareas_tecnicos_count == 0) {
                                ?>
                                <tr>
                                    <td>Aquí no hay nada.</td>
                                    <td>Aquí no hay nada.</td>
                                    <td>Aquí no hay nada.</td>
                                    <td>Aquí no hay nada.</td>
                                    <td>Aquí no hay nada.</td>
                                    <td>Aquí no hay nada.</td>
                                    <td>Aquí no hay nada.</td>
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

        // new DataTable('#tecnico', {
        //     scrollX: true
        // });

        // import DataTable from 'datatables.net-dt';
        // import 'datatables.net-responsive-dt';

        // let table = new DataTable('#tecnico', {
        //     responsive: true
        // });
    </script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>