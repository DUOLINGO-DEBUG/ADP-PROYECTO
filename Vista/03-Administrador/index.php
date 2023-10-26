<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="../../js/animacion.js"></script>
</head>

<?php
$rol_usuario = 'Admin -';
require_once('../00-utilidades/session.php');
require_once('../00-utilidades/preloader.php');
require_once('../00-utilidades/nav.php');

if (!isset($_SESSION["Id_Usuario"]) || ($_SESSION["Cargo_Cargos"] != 3)) {
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
                <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Usuarios</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Reportes</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab3-tab" data-bs-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">Reporte Mensual</a>
            </li>
        </ul>

        <!-- Contenido de las pestañas -->
        <div class="tab-content bg-white" id="myTabsContent">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">

                <div class="container">
                    <br>
                    <div class="row">
                        <div class="col">
                            <p><i class="bi bi-square-fill" style="color: #46c549;"></i> Cuenta Activa</p>
                        </div>
                        <div class="col">
                            <p><i class="bi bi-square-fill" style="color: #bb4245;"></i> Cuenta Desactivada</p>
                        </div>
                        <div class="col">
                            <p><i class="bi bi-square-fill" style="color: #c3c925;"></i> Recuperación de contrasena</p>
                        </div>
                        <div class="col">
                            <p><i class="bi bi-square-fill" style="color: #2971bb;"></i> Cuenta en espera de Aprovación</p>
                        </div>

                    </div>
                </div>

                <div class="principal">
                    <?php
                    if (is_array($usuarios)) {
                        // echo count($usuarios);
                        // var_dump($usuarios);
                        foreach ($usuarios as $usuario_card) {
                            $color_estado = 0;
                            switch ($usuario_card['Estado_Estados']) {
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
                                    $color_estado = 'dark';
                                    break;
                            }
                    ?>
                            <div class="columna m-3">
                                <div class="card" style="width: 20rem;">
                                    <i class="bi bi-square-fill" style="position: absolute; top: 0; right: 0; color: <?php echo $color_estado ?>;"></i>
                                    <img src="https://placehold.co/600x300?text=Usuario" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $usuario_card['Nombre_Usuario'] ?></h5>
                                        <p><?php echo $usuario_card['Nombre_Usuario'] . $usuario_card['Apellido_Usuario']; ?></p>
                                    </div>
                                    <ul class="list-group list-group-flush">

                                        <li class="list-group-item"><i class="bi bi-envelope-check"></i><?php echo ' ' . $usuario_card['Usuario_Usuario']; ?></li>
                                        <li class="list-group-item"><i class="bi bi-envelope-at-fill"></i><?php echo ' ' . $usuario_card['Correo_Usuario']; ?></li>
                                        <li class="list-group-item"><i class="bi bi-telephone-fill"></i><?php echo '+503 ' . $usuario_card['Telefono_Usuario']; ?></li>
                                    </ul>

                                    <div class="card-body text-center">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="d-grid gap-2">
                                                        <button type="button" class="btn btn-outline-success btn-block btn-sm"><i class="bi bi-lock-fill"></i> Activar</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="d-grid gap-2">
                                                        <button type="button" class="btn btn-outline-danger btn-block btn-sm"><i class="bi bi-lock-fill"></i> Desactivar</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <div class="col-md-6">
                                                    <div class="d-grid gap-2">
                                                        <button type="button" class="btn btn-outline-warning btn-block btn-sm"><i class="bi bi-lock-fill"></i> Recuperar</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="d-grid gap-2">
                                                        <button type="button" class="btn btn-outline-primary btn-block btn-sm"><i class="bi bi-lock-fill"></i> Aprobar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php
                        }
                    } else { ?>
                        <p>NO SE HAN REGISTRADO EMPLEADOS</p>
                    <?php } ?>

                </div>
            </div>
            <!-- ---------------------------------------------------------------------------- -->
            <!-- REPORTES LISTA -->
            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
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
                            <p><i class="bi bi-square-fill" style="color: #c3c925;"></i> Reportes no aprobados</p>
                        </div>

                    </div>
                </div>

                <div class="principal">
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
                                    $color_estado = 'dark';
                                    break;
                            }
                    ?>
                            <div class="columna m-3">
                                <div class="card" style="width: 20rem;">
                                    <i class="bi bi-square-fill" style="position: absolute; top: 0; left: 0; color: <?php echo $color_estado ?>;"></i>
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
            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="container">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div>
                                                <canvas id="doughnutChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Usuarios</th>
                                                        <th>Cantidad</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Administrador</td>
                                                        <td>1</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jefe de Área</td>
                                                        <td>3</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Técnico</td>
                                                        <td>2</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="container">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div style="width: 80%; margin: 0 auto;">
                                                <canvas id="ReportesAceptados"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Datos del gráfico donuas
        var data = {
            labels: ['Admin', 'Jefe A.', 'Técni.'],
            datasets: [{
                data: [1, 3, 2],
                backgroundColor: ['#190482', '#176B87', '#4F709C'],
            }]
        };

        var ctx = document.getElementById('doughnutChart').getContext('2d');

        // Crea el gráfico Doughnut
        var doughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: data
        });


        const ctx2 = document.getElementById('myChart');

        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        //GRAFICO REPORTES ACEPTADO
        
    </script>
</body>

</html>