<!DOCTYPE html>
<html lang="en">

<head>
    <title>ADMINISTRADOR</title>
    <link rel="icon" href="img/logo_1_000010.svg" type="image/x-icon" sizes="16x16 32x32 48x48">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- ----------------------------------------------------------------------------------------------CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" href="img/" type="image/x-icon" sizes="16x16 32x32 48x48">

    <!-- ----------------------------------------------------------------------------------------------JS -->
    <script src="../../js/animacion.js"></script>
    <script src="../../js/bootstrap/bootstrap.min.js"></script>
    <script src="../../js/Jquery/jquery-3.7.1.min.js"></script>
    <script src="../../js/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="../../js/"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<?php
$ruta = '../';
$rol_usuario = 'Admin -';
require_once('../00-utilidades/session.php');
require_once('../00-utilidades/preloader.php');
require_once('../00-utilidades/nav.php');
require_once('../../Controlador/ctr.encriptacion.php');

if (!isset($_SESSION["Id_Usuario"]) || ($_SESSION["Cargo_Cargos"] != 3)) {
    header("Location: ../../");
    exit();
} else {
    include('../../Controlador/ctr.time.php');
    include('../../Modelo/Modelo.usuarios.php');
    $usuario = new Usuario();
    $usuarios = $usuario->Listar_Usuarios();
    $usuarios_totales = $usuario->Listar_Usuarios_Totales();
    $tecnicos = $usuario->Listar_Tecnicos_Random();

    include('../../Modelo/Modelo.reportes.php');
    $reporte = new Reporte();
    $reportes = $reporte->Listar_Reportes();

    include_once('../../Controlador/ctr.ofertas.php');
    include('../../Controlador/ctr.registro.php');
    $registros = obtener_registros();
    $asignaciones = obtener_asignaciones();
}
?>

<body>
    <br>
    <div class="container">
        <!-- Pestañas -->
        <ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active position-relative" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">
                    Usuarios
                    <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-success">
                        <?php if (is_array($usuarios)) {
                            echo count($usuarios);
                        } else {
                            echo '0';
                        } ?>
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link position-relative" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">
                    Reportes
                    <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-success">
                        <?php if (is_array($reportes)) {
                            echo count($reportes);
                        } else {
                            echo '0';
                        } ?>
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab3-tab" data-bs-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">Estadística</a>
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
                                    <div class="col mt-1">
                                        <button class="btn btn-success btn-sm" data-bs-toggle="toast" data-bs-autohide="true" id="successBtn"><i class="bi bi-dice-1-fill"></i> Presióname</button>
                                    </div>
                                    <div class="col mt-1">
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="toast" data-bs-autohide="true" id="dangerBtn"><i class="bi bi-dice-2-fill"></i> Presióname</button>
                                    </div>
                                    <div class="col mt-1">
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="toast" data-bs-autohide="true" id="warningBtn"><i class="bi bi-dice-3-fill"></i> Presióname</button>
                                    </div>
                                    <div class="col mt-1">
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="toast" data-bs-autohide="true" id="primaryBtn"><i class="bi bi-dice-4-fill"></i> Presióname</button>
                                    </div>
                                    <div class="col mt-1">
                                        <button class="btn btn-dark btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#registroactividad" aria-controls="registroactividad"><i class="bi bi-dice-5-fill"></i> Presióname</button>
                                    </div>
                                    <!-- <div class="col">
                                        
                                    </div> -->
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
                            significa que la cuenta está en modo de <b>Recuperación</b>.
                            <hr>
                            Ahora con el botón <button class="btn btn-warning btn-sm"><i class="bi bi-key-fill"></i></button> pone la cuenta en modo recuperación
                            esto es util cuando el usuario a olvidado su contraseña.
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

                <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="registroactividad" aria-labelledby="registroactividadLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="registroactividadLabel">Registro de actividad.</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body bg-dark text-white background_zacamil">
                        <div class="list-group">
                            <!-- registros -->
                            <?php
                            // $usuarios_totales = $usuario->Listar_Usuarios_Totales();
                            if (is_array($registros)) {
                                foreach ($registros as $registroscanvas) {
                            ?>
                                    <a href="" class="list-group-item list-group-item-action mt-1" aria-current="true">
                                        <?php switch ($registroscanvas['Estado_Registro']) {
                                            case 1:
                                        ?>
                                                <div class="d-flex w-100 justify-content-between btn btn-success btn-sm">
                                                    <h6 class="mb-1"><i class="bi bi-person-fill-check"></i> Cuenta Activada</h6>
                                                    <small><?php echo formatearFecha($registroscanvas['Fecha_Registro']); ?></small>
                                                </div>
                                            <?php
                                                break;
                                            case 2:
                                            ?>
                                                <div class="d-flex w-100 justify-content-between btn btn-danger btn-sm">
                                                    <h6 class="mb-1"><i class="bi bi-person-fill-dash"></i> Cuenta Desactivada</h6>
                                                    <small><?php echo formatearFecha($registroscanvas['Fecha_Registro']); ?></small>
                                                </div>
                                            <?php
                                                break;
                                            case 3:
                                            ?>
                                                <div class="d-flex w-100 justify-content-between  btn btn-warning btn-sm">
                                                    <h6 class="mb-1"><i class="bi bi-person-fill-exclamation"></i> Modo Recuperación</h6>
                                                    <small><?php echo formatearFecha($registroscanvas['Fecha_Registro']); ?></small>
                                                </div>

                                        <?php
                                                break;
                                        }
                                        ?>
                                        <p class="mb-1"><b>[+]</b> <?php echo $registroscanvas['Usuario_Usuario']; ?></p>
                                        <small><b>por</b> <?php echo $registroscanvas['admin']; ?></small>
                                    </a>
                            <?php

                                }
                            }
                            ?>
                        </div>

                    </div>
                </div>

                <div class="principal">
                    <?php
                    $numero_arreglo_usuarios = 0;
                    if (is_array($usuarios)) {
                        $numero_arreglo_usuarios = count($usuarios);
                        // var_dump($usuarios);
                        foreach ($usuarios as $usuario_card) {
                            $rol = '';

                            if ($usuario_card['Cargo_Cargos'] == 1) {
                                $rol = 'Jefe de Área';
                            } else {
                                $rol = 'Técnico';
                            }

                            $color_estado = 0;
                            $color_icon = '';

                            $btn1Nombre = '';
                            $btn1Llave = '';
                            $btn1Color = '';
                            $btn2Nombre = '';
                            $btn2Llave = '';
                            $btn2Color = '';

                            $accion_usuario_bt1 = '';
                            $accion_usuario_bt2 = '';

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

                                    $accion_usuario_bt1 = '13';
                                    $accion_usuario_bt2 = '12';



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

                                    $accion_usuario_bt1 = '11';
                                    $accion_usuario_bt2 = '13';


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

                                    $accion_usuario_bt1 = '11';
                                    $accion_usuario_bt2 = '12';

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

                                    $accion_usuario_bt1 = '11';
                                    $accion_usuario_bt2 = '12';

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
                                        <h5 class="card-title  <?php echo $color_icon; ?>"><?php echo $rol ?></h5>
                                        <p class="text-sm"><?php echo substr($usuario_card['Nombre_Usuario'] . ' ' . $usuario_card['Apellido_Usuario'], 0, 27); ?>...</p>
                                    </div>
                                    <ul class="list-group list-group-flush text_correo">

                                        <li class="list-group-item"><i class="bi bi-envelope-check color_zacamil"></i><?php echo ' ' . $usuario_card['Usuario_Usuario']; ?></li>
                                        <li class="list-group-item"><i class="bi bi-envelope-at-fill color_zacamil"></i><?php echo ' ' . $usuario_card['Correo_Usuario']; ?></li>
                                        <li class="list-group-item"><i class="bi bi-telephone-fill color_zacamil"></i><?php echo '+503 ' . $usuario_card['Telefono_Usuario']; ?></li>
                                    </ul>

                                    <div class="card-body text-center">
                                        <div class="container">
                                            <div class="row">

                                                <div class="col">
                                                    <div class="d-grid gap-2">
                                                        <a type="button" data-id="<?php echo encriptar($usuario_card['Id_Usuario']); ?>" data-custom-data="<?php echo $btn1Llave; ?>" data-correo-usuario="<?php echo $usuario_card['Usuario_Usuario'] ?>" data-accion-usuario="<?php echo $accion_usuario_bt1; ?>" class="btn <?php echo $btn1Color; ?> btn-block btn-sm llaves_btn"><?php echo $btn1Nombre ?></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <div class="col">
                                                    <div class="d-grid gap-2">
                                                        <a type="button" data-id="<?php echo encriptar($usuario_card['Id_Usuario']); ?>" data-custom-data="<?php echo $btn2Llave; ?>" data-correo-usuario="<?php echo $usuario_card['Usuario_Usuario'] ?>" data-accion-usuario="<?php echo $accion_usuario_bt2; ?>" class="btn <?php echo $btn2Color; ?> btn-block btn-sm llaves_btn"><?php echo $btn2Nombre ?></a>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row my-2">
                                                <div class="col">
                                                    <div class="d-grid gap-2">
                                                        <button type="button" class="btn btn_zacamil btn-sm" data-bs-toggle="modal" data-bs-target="#usr<?php echo $usuario_card['Id_Usuario']; ?>">Detalles</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- --------------------------------------------------------------------------- -->
                            <div class="modal fade" id="usr<?php echo $usuario_card['Id_Usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="usra<?php echo $usuario_card['Id_Usuario']; ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="usra<?php echo $usuario_card['Id_Usuario']; ?>">Detalles de Usuario</h5>
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
                    }
                    ?>

                    <?php
                    if ($numero_arreglo_usuarios == 0) {
                    ?>
                        <div class="columna">
                            <div class=" container-fluid h-100 d-flex align-items-center justify-content-center">
                                <div class="text-center">
                                    <h6><span><i class="bi bi-box-seam-fill"></i></span> ¿Tú empleados desaparecieron?, cuando haya empleados registrados aparecerán aquí.</h6>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
            <!-- ---------------------------------------------------------------------------- -->
            <!-- REPORTES LISTA -->
            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">

                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Necesitas información?</div>
                            <div class="container">
                                <div class="row">
                                    <div class="col mt-1">
                                        <button class="btn btn-success btn-sm" data-bs-toggle="toast" data-bs-autohide="true" id="successBtnreport"><i class="bi bi-dice-1-fill"></i> Presióname</button>
                                    </div>
                                    <div class="col mt-1">
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="toast" data-bs-autohide="true" id="dangerBtnreport"><i class="bi bi-dice-2-fill"></i> Presióname</button>
                                    </div>
                                    <div class="col mt-1">
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="toast" data-bs-autohide="true" id="warningBtnreport"><i class="bi bi-dice-3-fill"></i> Presióname</button>
                                    </div>
                                    <div class="col mt-1">
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
                                                <hr>
                                                <div class="text-center">
                                                    <h5><i class="bi bi-send-plus-fill"></i> Asigna miento de reporte a técnico</h5>
                                                </div>
                                                <hr>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text icon_zacamil"><i class="bi bi-body-text"></i></span>
                                                    <div class="form-floating">
                                                        <textarea required class="form-control" placeholder="Leave a comment here" id="anexo_id" name="anexo_reporte"><?php echo $reportes_card['Anexo_Reporte']; ?></textarea>
                                                        <label for="floatingTextarea">Anexo.</label>
                                                    </div>
                                                </div>

                                                <?php
                                                if ($reportes_card['Estado_Reporte'] != 2) {
                                                ?>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text icon_zacamil"><i class="bi bi-person-lines-fill"></i></span>
                                                        <div class="form-floating">
                                                            <select class="form-select" id="floatingSelectDisabled" name="rol" aria-label="Floating label" required="">
                                                                <?php
                                                                // $usuarios_totales = $usuario->Listar_Usuarios_Totales();
                                                                if (is_array($tecnicos)) {
                                                                    foreach ($tecnicos as $tecnicosSelectd) {
                                                                ?>
                                                                        <option value="<?php echo encriptar($tecnicosSelectd['Id_Usuario']); ?>"><?php echo $tecnicosSelectd['Usuario_Usuario']; ?></option>
                                                                <?php

                                                                    }
                                                                }
                                                                ?>

                                                            </select>
                                                            <label for="floatingSelectDisabled">Seleccionar Ténico.</label>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                            <?php
                                            if ($reportes_card['Estado_Reporte'] != 2) {
                                            ?>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cancelar</button>
                                                    <a id="btnRechazo" href="../../Controlador/ctr.ofertas.php?message=<?php echo encriptar($reportes_card['Id_Reporte']);?>" class="btn btn-danger btn-sm"><i class="bi bi-x-circle"></i> Rechazar</a>
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
                        <div class="columna">
                            <div class=" container-fluid h-100 d-flex align-items-center justify-content-center">
                                <div class="text-center">
                                    <h6><span><i class="bi bi-box-seam-fill"></i></span> Bueno, Tal parece que no hay reportes…, Esperar a que registren o registrar uno tú mismo.</h6>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
            <!-- ESTADISTICAS -->
            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                <div class="container">



                    <div class="row">
                        <div class="col-md-3">
                            <div class="container">
                                <div class="container">
                                    <hr style="background-color: #01274e;">
                                    <h6 class="text-center">USUARIOS ACTIVOS</h6>
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
                                                    <?php
                                                    // $usuarios_totales = $usuario->Listar_Usuarios_Totales();
                                                    $total_roles;
                                                    if (is_array($usuarios_totales)) {
                                                        $total_roles = count($usuarios);
                                                        // $roles = 0;
                                                        foreach ($usuarios_totales as $usuarios_totales_individual) {
                                                            $rol = '';
                                                            switch ($usuarios_totales_individual['ROl']) {
                                                                case 1:
                                                                    $rol = 'Técnico';
                                                                    break;
                                                                case 2:
                                                                    $rol = 'Jefe de Área';
                                                                    break;
                                                                case 3:
                                                                    $rol = 'Administrador';
                                                                    break;
                                                                default:
                                                                    $rol = 'Otros Usuarios';
                                                                    break;
                                                            }
                                                    ?>
                                                            <tr>

                                                                <td><?php echo $rol ?></td>
                                                                <td><?php echo $usuarios_totales_individual['cantidad_de_usuarios']; ?></td>
                                                            </tr>
                                                        <?php
                                                            // $roles++;
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td>Técnico</td>
                                                            <td>No existen!</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jefe de Área</td>
                                                            <td>No existen!</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Administrador</td>
                                                            <td>No existen!</td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="container">
                                <hr style="background-color: #01274e;">
                                <h3 class="text-center">REPORTE ANUAL</h3>
                                <div>
                                    <canvas id="lineChart"></canvas>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="container">

                                <hr style="background-color: #01274e;">
                                <h3 class="text-center">REPORTE DIARIO</h3>
                                <div>
                                    <canvas id="RegistroMes"></canvas>

                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                </div>
            </div>
        </div>
    </div>

    <?php
    //     $mes_Reporte = date('m');
    // $reporte_F = estadisticas_mes($mes_Reporte);
    // echo var_dump($reporte_F);
    ?>

    <script>
        // Obtén referencias a los elementos
        // var textarea = document.getElementById('anexo_id');
        // var enlace = document.getElementById('btnRechazo');

        // // Agrega un event listener al enlace para verificar el textarea antes de seguir el enlace
        // enlace.addEventListener('click', function(event) {
        //     // Verifica si el textarea cumple con la condición required
        //     if (textarea.checkValidity()) {
        //         // Si cumple, permite seguir el enlace
        //         alert('Textarea cumple con la condición required. ¡Puedes seguir el enlace!');
        //     } else {
        //         // Si no cumple, evita seguir el enlace
        //         alert('Textarea no cumple con la condición required. ¡Completa el textarea antes de seguir el enlace!');
        //         event.preventDefault(); // Evita el comportamiento predeterminado del enlace
        //     }
        // });
    </script>

    <script>
        <?php
        $dia_reporte = date('d');
        $mes_Reporte = date('m');
        $year_Reporte = date('Y');
        // $dia_reporte = 9; estadisticas_mes()

        ?>
        const datosBarrasHorizontales = {

            labels: [
                <?php
                for ($i = 1; $i <= $dia_reporte; $i++) {
                    echo  "'Día " . str_pad($i, 2, '0', STR_PAD_LEFT) . "',";
                }
                ?>
            ],
            datasets: [{
                    label: 'Reportes Aprobados',
                    data: [<?php
                            $reporte_F = estadisticas_mes($mes_Reporte, 1);

                            if (is_array($reporte_F)) {
                                for ($j = 1; $j <= $dia_reporte; $j++) {
                                    $fecha_for = $year_Reporte . '-' . $mes_Reporte . '-' . str_pad($j, 2, '0', STR_PAD_LEFT);

                                    // echo $fecha_for;
                                    $indice = array_search($fecha_for, array_column($reporte_F, 'dia'));

                                    if ($indice !== false) {
                                        $cantidadEncontrada = $reporte_F[$indice]['cantidad_de_reportes'];
                                        echo $cantidadEncontrada . ',';
                                    } else {
                                        echo '0' . ',';
                                    }
                                }
                            } else {
                                for ($j = 1; $j <= $dia_reporte; $j++) {
                                    echo '0,';
                                }
                            }
                            ?>],
                    backgroundColor: '#198754',
                    // backgroundColor: '#053F7C' '#198754',
                    borderWidth: 2
                },
                {
                    label: 'Reportes Rechazados',
                    data: [<?php
                            $reporte_F = estadisticas_mes($mes_Reporte, 2);

                            if (is_array($reporte_F)) {
                                for ($j = 1; $j <= $dia_reporte; $j++) {
                                    $fecha_for = $year_Reporte . '-' . $mes_Reporte . '-' . str_pad($j, 2, '0', STR_PAD_LEFT);

                                    // echo $fecha_for;
                                    $indice = array_search($fecha_for, array_column($reporte_F, 'dia'));

                                    if ($indice !== false) {
                                        $cantidadEncontrada = $reporte_F[$indice]['cantidad_de_reportes'];
                                        echo $cantidadEncontrada . ',';
                                    } else {
                                        echo '0' . ',';
                                    }
                                }
                            } else {
                                for ($j = 1; $j <= $dia_reporte; $j++) {
                                    echo '0,';
                                }
                            }
                            ?>],
                    backgroundColor: '#dc3545',
                    // backgroundColor: '#AD002E',
                    borderWidth: 2
                },
                {
                    label: 'Reportes Finalizados',
                    data: [<?php
                            $reporte_F = estadisticas_mes($mes_Reporte, 3);

                            if (is_array($reporte_F)) {
                                for ($j = 1; $j <= $dia_reporte; $j++) {
                                    $fecha_for = $year_Reporte . '-' . $mes_Reporte . '-' . str_pad($j, 2, '0', STR_PAD_LEFT);

                                    // echo $fecha_for;
                                    $indice = array_search($fecha_for, array_column($reporte_F, 'dia'));

                                    if ($indice !== false) {
                                        $cantidadEncontrada = $reporte_F[$indice]['cantidad_de_reportes'];
                                        echo $cantidadEncontrada . ',';
                                    } else {
                                        echo '0' . ',';
                                    }
                                }
                            } else {
                                for ($j = 1; $j <= $dia_reporte; $j++) {
                                    echo '0,';
                                }
                            }
                            ?>],
                    backgroundColor: '#01274e',
                    // backgroundColor: '#176b87',
                    borderWidth: 2
                }

            ]
        };

        const datosLinea = {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            datasets: [{
                label: 'Reportes Generados',
                data: [<?php
                        $reporte_F = estadisticas_mes($mes_Reporte, 4);


                        if (is_array($reporte_F)) {
                            for ($k = 1; $k <= 12; $k++) {
                                // var_dump($reporte_F);
                                // echo $fecha_for;
                                $indice = array_search($k, array_column($reporte_F, 'mes'));

                                if ($indice !== false) {
                                    $cantidadEncontrada = $reporte_F[$indice]['cantidad_de_reportes'];
                                    echo $cantidadEncontrada . ',';
                                } else {
                                    echo '0' . ',';
                                }
                            }
                        } else {
                            for ($k = 1; $k <= 12; $k++) {
                                echo '0,';
                            }
                        }
                        ?>],
                fill: false,
                borderColor: '#176b87',
                borderWidth: 2
            }]
        };

        const configBarrasHorizontales = {
            type: 'bar',
            data: datosBarrasHorizontales,
            options: {
                indexAxis: 'y',
                responsive: true
            }
        };



        const configLinea = {
            type: 'line',
            data: datosLinea,
            options: {
                responsive: true
            }
        };

        var ctxBarrasHorizontales = document.getElementById('RegistroMes').getContext('2d');
        var ctxLinea = document.getElementById('lineChart').getContext('2d');

        new Chart(ctxBarrasHorizontales, configBarrasHorizontales);
        new Chart(ctxLinea, configLinea);
    </script>

    <script>
        // Datos del gráfico donuas
        var data = {
            labels: ['Jefe A.', 'Técni', 'Admin'],
            datasets: [{
                data: [<?php if (is_array($usuarios_totales)) {

                            foreach ($usuarios_totales as $usuarios_totales_individual) {

                                if ($usuarios_totales_individual['cantidad_de_usuarios'] == 0) {
                                    echo '0.5,';
                                } else {
                                    echo $usuarios_totales_individual['cantidad_de_usuarios'] . ',';
                                }
                            }
                        } else {
                        }
                        ?>],
                backgroundColor: ['#190482', '#176B87', '#4F709C'],
            }]
        };

        var ctx = document.getElementById('doughnutChart').getContext('2d');

        // Crea el gráfico Doughnut
        var doughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: data
        });

        // ------------------------------------------------------------------
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

    <script>
        $(document).ready(function() {
            $(".llaves_btn").on("click", function() {
                var userId = $(this).data("id");
                var customData = $(this).data("custom-data");
                var correo = $(this).data("correo-usuario");
                var accion = $(this).data("accion-usuario")

                var requestData = {
                    userId: userId,
                    customData: customData,
                    admin: '<?php echo encriptar($_SESSION['Id_Usuario']); ?>'
                };

                $.ajax({
                    type: "POST",
                    url: "../../Controlador/ctr.usuarios.php",
                    data: requestData,

                    success: function(response) {
                        // $(".user-info").html(response);

                        var movimiento = '';

                        switch (accion) {
                            case 11:
                                movimiento = '<b class="text-success">ACTIVADA</b>';
                                break;
                            case 12:
                                movimiento = '<b class="text-danger">DESACTIVADA</b>';

                                break;
                            case 13:
                                movimiento = '<b class="text-warning">RECUPERADA</b>';
                                break;
                            case 14:
                                movimiento = '<b class="text-warning">NUEVA?</b>';
                                break;
                            default:
                                movimiento = '<b class="text-danger">Bug? x_x</b>';

                        }

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
                            html: '<p style="font-size: 12px;"><b>Cuenta: </b><b class="color_zacamil">' + correo + '</b><b> configurada para ser ' + movimiento + '</b><br>Para poder observar los cambios, Actualicé el sitio web.</p>'
                        })
                    },
                    error: function() {
                        // console.error("Error en la solicitud AJAX");
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
                            icon: 'warning',
                            iconColor: 'red',
                            html: '<p><b>Error interno.</b><hr>No se puede conectar con el ctr/Administrador</p>'
                        })
                    }
                });
            });
        });
    </script>
</body>

</html>