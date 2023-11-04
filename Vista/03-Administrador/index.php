<!DOCTYPE html>
<html lang="en">

<head>
    <title>ZACAMIL</title>
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
$rol_usuario = 'Admin -';
require_once('../00-utilidades/session.php');
require_once('../00-utilidades/preloader.php');
require_once('../00-utilidades/nav.php');
require_once('../../Controlador/ctr.encriptacion.php');

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


                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Necesitas información?</div>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <button class="btn btn-success btn-sm" data-bs-toggle="toast" data-bs-autohide="true" id="successBtn"><i class="bi bi-dice-1-fill"></i> Presióname</button>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="toast" data-bs-autohide="true" id="dangerBtn"><i class="bi bi-dice-2-fill"></i> Presióname</button>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="toast" data-bs-autohide="true" id="warningBtn"><i class="bi bi-dice-3-fill"></i> Presióname</button>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="toast" data-bs-autohide="true" id="primaryBtn"><i class="bi bi-dice-4-fill"></i> Presióname</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="badge bg-primary rounded-pill"><i class="bi bi-dice-6-fill"></i></span>
                    </li>
                </ol>

                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
                    <div class="toast" role="alert" data-bs-autohide="true" id="successToast" data-bs-delay="9000">
                        <div class="toast-header text-success">
                            <strong class="me-auto"><i class="bi bi-cone-striped"></i> CUENTA ACTIVA</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
                        </div>
                        <div class="toast-body">
                            Si en el perfil del usuario se encuentra el siguiente símbolo <i class="bi bi-square-fill text-success"></i>
                            significa que la cuenta está <b>activa</b> y funcionando.
                            <hr>
                            Ahora con el botón <button class="btn btn-success btn-sm"><i class="bi bi-key-fill"></i></button> es para activar cuentas en dado
                            caso algún usuario se haya registrado o alguna cuenta haya sido bloqueada anteriormente.
                        </div>
                    </div>

                    <div class="toast" role="alert" data-bs-autohide="true" id="dangerToast" data-bs-delay="9000">
                        <div class="toast-header text-danger">
                            <strong class="me-auto"><i class="bi bi-cone-striped"></i> CUENTA DESACTIVADA</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
                        </div>
                        <div class="toast-body">
                            Si en el perfil del usuario se encuentra el siguiente símbolo <i class="bi bi-square-fill text-danger"></i>
                            significa que la cuenta está <b>desactiva</b>, Eso quiere decir que no podra iniciar sección.
                            <hr>
                            Ahora con el botón <button class="btn btn-danger btn-sm"><i class="bi bi-key-fill"></i></button> es para bloquear cuentas de usuarios,
                            Por tanto no podra iniciar sección la proxima vez.
                        </div>
                    </div>

                    <div class="toast" role="alert" data-bs-autohide="true" id="warningToast" data-bs-delay="9000">
                        <div class="toast-header text-warning">
                            <strong class="me-auto"><i class="bi bi-cone-striped"></i> CUENTA EN RECUPERACIÓN</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
                        </div>
                        <div class="toast-body">
                            Si en el perfil del usuario se encuentra el siguiente símbolo <i class="bi bi-square-fill text-warning"></i>
                            significa que la cuenta está en modo de <b>Recuperación</b>, Esto es por motivos de que el usuario olvido su contraseña.
                        </div>
                    </div>

                    <div class="toast" role="alert" data-bs-autohide="true" id="primaryToast" data-bs-delay="9000">
                        <div class="toast-header text-primary">
                            <strong class="me-auto"><i class="bi bi-cone-striped"></i> CUENTA NUEVA</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
                        </div>
                        <div class="toast-body">
                            Si en el perfil del usuario se encuentra el siguiente símbolo <i class="bi bi-square-fill text-primary"></i>
                            significa que la cuenta es <b>Nueva</b>, Por lo tanto, solo necesitará que apruebe la cuenta.
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
                            $color_icon = '';

                            $btn1Nombre = '';
                            $btn1Llave = '';
                            $btn1Color = '';
                            $btn2Nombre = '';
                            $btn2Llave = '';
                            $btn2Color = '';

                            // echo '<h1>'.$usuario_card['Estado_Estados'].'</h1>';
                            switch ($usuario_card['Estado_Estados']) {
                                    //cuenta activa
                                case 1:
                                    $color_estado = '#198754';
                                    $color_icon = 'text-success';
                                    // $color_estado = '#0d6efd';
                                    $color_icon = 'text-success';
                                    $btn1Nombre = '<i class="bi bi-key-fill"></i> MODO RECUPERACIÓN';
                                    $btn1Llave = encriptar(103);
                                    $btn1Color = 'btn-warning';
                                    $btn2Nombre = '<i class="bi bi-key-fill"></i> DESACTIVAR CUENTA';
                                    $btn2Llave = encriptar(102);
                                    $btn2Color = 'btn-danger';

                                    break;
                                    //cuenta desactiva
                                case 2:
                                    $color_estado = '#dc3545';
                                    $color_icon = 'text-danger';

                                    $btn1Nombre = '<i class="bi bi-key-fill"></i> ACTIVAR CUENTA';
                                    $btn1Llave = encriptar(101);
                                    $btn1Color = 'btn-success';
                                    $btn2Nombre = '<i class="bi bi-key-fill"></i> MODO RECUPERACIÓN';
                                    $btn2Llave = encriptar(103);
                                    $btn2Color = 'btn-warning';

                                    break;
                                    //cuenta recuperación
                                case 3:
                                    $color_estado = '#ffc107';
                                    $color_icon = 'text-warning';

                                    $btn1Nombre = '<i class="bi bi-key-fill"></i> ACTIVAR CUENTA';
                                    $btn1Llave = encriptar(101);
                                    $btn1Color = 'btn-success';
                                    $btn2Nombre = '<i class="bi bi-key-fill"></i> DESACTIVAR CUENTA';
                                    $btn2Llave = encriptar(102);
                                    $btn2Color = 'btn-danger';

                                    break;
                                    //cuenta nueva
                                case 4:
                                    $color_estado = '#0d6efd';
                                    $color_icon = 'text-primary';
                                    $btn1Nombre = '<i class="bi bi-key-fill"></i> ACTIVAR CUENTA';
                                    $btn1Llave = encriptar(101);
                                    $btn1Color = 'btn-success';
                                    $btn2Nombre = '<i class="bi bi-key-fill"></i> DESACTIVAR CUENTA';
                                    $btn2Llave = encriptar(102);
                                    $btn2Color = 'btn-danger';

                                    break;
                                default:
                                    $color_estado = 'dark';

                                    break;
                            }
                    ?>
                            <div class="columna m-2">
                                <div class="card card_pc">
                                    <i class="bi bi-square-fill" style="position: absolute; top: 0; right: 0; color: <?php echo $color_estado ?>;"></i>

                                    <div class="card-body text_titulo">
                                        <h5 class="card-title  <?php echo $color_icon; ?>"><?php echo $usuario_card['Fecha_Creacion_Usuario'] ?></h5>
                                        <p class="text-sm"><?php echo substr($usuario_card['Nombre_Usuario'] . ' ' . $usuario_card['Apellido_Usuario'], 0, 27); ?>...</p>
                                    </div>
                                    <ul class="list-group list-group-flush text_correo">

                                        <li class="list-group-item"><i class="bi bi-envelope-check <?php echo $color_icon; ?>"></i><?php echo ' ' . $usuario_card['Usuario_Usuario']; ?></li>
                                        <li class="list-group-item"><i class="bi bi-envelope-at-fill  <?php echo $color_icon; ?>"></i><?php echo ' ' . $usuario_card['Correo_Usuario']; ?></li>
                                        <li class="list-group-item"><i class="bi bi-telephone-fill  <?php echo $color_icon; ?>"></i><?php echo '+503 ' . $usuario_card['Telefono_Usuario']; ?></li>
                                    </ul>

                                    <div class="card-body text-center">
                                        <div class="container">
                                            <div class="row">

                                                <div class="col">
                                                    <div class="d-grid gap-2">
                                                        <a type="button" data-id="<?php echo encriptar($usuario_card['Id_Usuario']); ?>" data-custom-data="<?php echo $btn1Llave; ?>" data-correo-usuario="<?php echo $usuario_card['Usuario_Usuario'] ?>" class="btn <?php echo $btn1Color; ?> btn-block btn-sm llaves_btn"><?php echo $btn1Nombre ?></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <div class="col">
                                                    <div class="d-grid gap-2">
                                                        <a type="button" data-id="<?php echo encriptar($usuario_card['Id_Usuario']); ?>" data-custom-data="<?php echo $btn2Llave; ?>" data-correo-usuario="<?php echo $usuario_card['Usuario_Usuario'] ?>" class="btn <?php echo $btn2Color; ?> btn-block btn-sm llaves_btn"><?php echo $btn2Nombre ?></a>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row my-2">
                                                <div class="col">
                                                    <div class="d-grid gap-2">
                                                        <button type="button" class="btn btn_zacamil btn-sm" data-bs-toggle="modal" data-bs-target="#usr0<?php echo $usuario_card['Id_Usuario']; ?>">Detalles</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- --------------------------------------------------------------------------- -->
                            <div class="modal fade" id="usr0<?php echo $usuario_card['Id_Usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="usra0<?php echo $usuario_card['Id_Usuario']; ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="usra0<?php echo $usuario_card['Id_Usuario']; ?>">Detalles de Usuario</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modal-body">

                                                <div class="input-group mb-3">
                                                    <span class="input-group-text icon_zacamil"><i class="bi bi-person"></i></span>
                                                    <div class="form-floating">
                                                        <input readonly value="<?php echo $usuario_card['Nombre_Usuario']; ?>" type="text" class="form-control" id="floatingInput" name="primer_nombre" placeholder="" maxlength="15" minlength="5" required="">
                                                        <label for="floatingInput">Nombres <b class="importante_zacamil">*</b></label>
                                                    </div>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <span class="input-group-text icon_zacamil"><i class="bi bi-person"></i></span>
                                                    <div class="form-floating">
                                                        <input readonly value="<?php echo $usuario_card['Apellido_Usuario']; ?>" type="text" class="form-control" id="floatingInput" name="primer_apellido" placeholder="" maxlength="15" minlength="5" required="">
                                                        <label for="floatingInput">Apellidos<b class="importante_zacamil">*</b></label>
                                                    </div>
                                                </div>
                                                <!-- --------------------------------------------------------------[correo] -->
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text icon_zacamil"><i class="bi bi-envelope"></i></span>
                                                    <div class="form-floating">
                                                        <input readonly value="<?php echo $usuario_card['Correo_Usuario']; ?>" type="email" class="form-control" id="floatingInput" name="correo" placeholder="" maxlength="80" minlength="5" required="">
                                                        <label for="floatingInput">Correo Electrónico <b class="importante_zacamil">*</b></label>
                                                    </div>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <span class="input-group-text icon_zacamil"><i class="bi bi-envelope"></i></span>
                                                    <div class="form-floating">
                                                        <input readonly value="<?php echo $usuario_card['Usuario_Usuario']; ?>" type="email" class="form-control" id="floatingInput" name="correo_Zacamil" placeholder="" maxlength="80" minlength="5" required="">
                                                        <label for="floatingInput">Correo de usuario <b class="importante_zacamil">*</b></label>
                                                    </div>
                                                </div>

                                                <!-- --------------------------------------------------------------[telefono] -->
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text icon_zacamil"><i class="bi bi-telephone"></i></span>
                                                    <div class="form-floating">
                                                        <input readonly value="<?php echo $usuario_card['Telefono_Usuario']; ?>" type="number" class="form-control" id="floatingInput" name="telefono" placeholder="" pattern="\d{8}" maxlength="8" minlength="8" required="">
                                                        <label for="floatingInput">Número de Teléfono <b class="importante_zacamil">*</b></label>
                                                    </div>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <span class="input-group-text icon_zacamil"><i class="bi bi-telephone"></i></span>
                                                    <div class="form-floating">
                                                        <input readonly value="<?php echo substr($usuario_card['Fecha_Creacion_Usuario'], 0, 10); ?>" type="date" class="form-control" id="floatingInput" name="telefono" placeholder="" pattern="\d{8}" maxlength="8" minlength="8" required="">
                                                        <label for="floatingInput">Fecha de Creación <b class="importante_zacamil">*</b></label>
                                                    </div>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <span class="input-group-text icon_zacamil"><i class="bi bi-person-lines-fill"></i></span>
                                                    <div class="form-floating">
                                                        <select class="form-select" id="floatingSelectDisabled" name="rol" aria-label="Floating label" required="">
                                                            <option value="1">Jefe de área</option>
                                                            <option value="2">Técnico</option>
                                                        </select>
                                                        <label for="floatingSelectDisabled">Rol de usuario</label>
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

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
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
    <script>
        var successBtn = document.getElementById('successBtn');
        var dangerBtn = document.getElementById('dangerBtn');
        var warningBtn = document.getElementById('warningBtn');
        var primaryBtn = document.getElementById('primaryBtn');

        var successToast = new bootstrap.Toast(document.getElementById('successToast'));
        var dangerToast = new bootstrap.Toast(document.getElementById('dangerToast'));
        var warningToast = new bootstrap.Toast(document.getElementById('warningToast'));
        var primaryToast = new bootstrap.Toast(document.getElementById('primaryToast'));

        successBtn.addEventListener('click', function() {
            successToast.show();
        });

        dangerBtn.addEventListener('click', function() {
            dangerToast.show();
        });

        warningBtn.addEventListener('click', function() {
            warningToast.show();
        });

        primaryBtn.addEventListener('click', function() {
            primaryToast.show();
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".llaves_btn").on("click", function() {
                var userId = $(this).data("id");
                var customData = $(this).data("custom-data");
                var correo = $(this).data("correo-usuario");

                switch (opcion) {
                    case 1:
                        System.out.println("Seleccionaste la opción 1");
                        break;
                    case 2:
                        System.out.println("Seleccionaste la opción 2");
                        break;
                    case 3:
                        System.out.println("Seleccionaste la opción 3");
                        break;
                    default:
                        System.out.println("Opción no válida");
                }

                var requestData = {
                    userId: userId,
                    customData: customData,
                    admin: '<?php echo encriptar($_SESSION['Id_Usuario']); ?>'
                };

                $.ajax({
                    type: "POST",
                    url: "../../Controlador/ctr.usuarios.php",
                    data: requestData, // Envía el objeto requestData
                    success: function(response) {
                        $(".user-info").html(response);
                        console.log(response);

                        //notificación
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'success',
                            iconColor: '#01274e',
                            html: '<p style="font-size: 12px;"><b>Cuenta: </b><b class="color_zacamil">' + correo + '</b><b> configurada</b><br>Para poder observar los cambios, Actualicé el sitio web.</p>'
                        })
                    },
                    error: function() {
                        console.error("Error en la solicitud AJAX");
                    }
                });
            });
        });
    </script>
</body>

</html>