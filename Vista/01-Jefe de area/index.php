<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jefe de Área</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="../../js/animacion.js"></script>
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
    include('../../Modelo/Modelo.usuarios.php');
    $usuario = new Usuario();
    $usuarios = $usuario->Listar_Usuarios();

    include('../../Modelo/Modelo.reportes.php');
    $reporte = new Reporte();
    $reportes = $reporte->Listar_Reportes();
}
?>

<body>
    <br>
    <div class="container">
        <!-- Pestañas -->
        <ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Mis Reportes</a>
            </li>
        </ul>

        <!-- Contenido de las pestañas -->
        <div class="tab-content bg-white" id="myTabsContent">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                <div class="container">
                    <br>
                    <div class="row">
                        <div class="col">
                            <p><i class="bi bi-square-fill" style="color: #46c549;"></i> Reporte Aceptados</p>
                        </div>
                        <div class="col">
                            <p><i class="bi bi-square-fill" style="color: #bb4245;"></i> Reporte Rechazados</p>
                        </div>
                        <div class="col">
                            <p><i class="bi bi-square-fill" style="color: #292929;"></i> Reportes no aprobados</p>
                        </div>

                    </div>
                </div>

                <div class="principal">
                    <!-- <div class="columna m-3">
                        <div class="card" style="width: 20rem;">
                            <img src="../../img/Add_00001.png" class="card-img-top" alt="...">
                        </div>
                    </div> -->
                    <?php
                    if (is_array($reportes)) {
                        $numero_arreglo = count($reportes);
                        // var_dump($usuarios);
                        foreach ($reportes as $reportes_card) {
                            $color_estado = 0;
                            switch ($reportes_card['Estado_Reporte']) {
                                case 1:
                                    $color_estado = '#46c549';
                                    break;
                                case 2:
                                    $color_estado = '#bb4245';
                                    break;
                                case 3:
                                    $color_estado = '#c3c925';
                                    break;
                                case 3:
                                    $color_estado = '#2971bb';
                                    break;
                                default:
                                    $color_estado = '#292929';
                                    break;
                            }
                    ?>
                            <div class="columna m-3">
                                <div class="card" style="width: 20rem;">
                                    <!-- <i class="bi bi-square-fill" style="position: absolute; top: 0; left: 0;"></i> -->
                                    <img src="https://placehold.co/600x300?text=Reportes" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p><b><?php echo $reportes_card['Nombre_Equipo_Reporte'] ?></b></p>
                                        <p><?php echo $reportes_card['Descripcion_Incidente_Reporte'] ?></p>

                                    </div>
                                    <ul class="list-group list-group-flush">

                                        <li class="list-group-item"><i class="bi bi-envelope-check"></i><?php echo ' ' . $reportes_card['Nombre_Usuario'] . ' ' . $reportes_card['Apellido_Usuario']; ?></li>
                                        <li class="list-group-item"><i class="bi bi-envelope-at-fill"></i><?php echo ' ' . $reportes_card['Marca_Reporte']; ?></li>
                                        <li class="list-group-item"><i class="bi bi-telephone-fill"></i><?php echo ' ' . $reportes_card['Area_Reporte']; ?></li>
                                    </ul>

                                    <div class="card-body text-center">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="d-grid gap-2">
                                                        <button type="button" style="background-color: <?php echo $color_estado ?>; pointer-events: none;" class="btn btn-block btn-sm"></button>
                                                    </div>
                                                    <div class="d-grid gap-2 my-2">
                                                        <button type="button" class="btn btn-outline-primary btn-block btn-sm">VER DETALLADAMENTE</button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php
                        }
                    }
                    if ($numero_arreglo == 0) { ?>
                        <h1>NO SE HAN REGISTRADO REPORTES</h1>
                    <?php } ?>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>