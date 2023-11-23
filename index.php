<!doctype html>
<html lang="es">

<?php
try {
    $ip = file_get_contents('https://api.ipify.org');

    if ($ip === false) {
        $ip = 'NO HAY IP <i class="bi bi-wifi-off"></i>';
    } else {
    }
} catch (Exception $e) {
    // Manejar la excepción generada
    // echo "Error: " . $e->getMessage();
}
?>

<head>
    <title>ZACAMIL</title>
    <link rel="icon" href="img/logo_1_000010.svg" type="image/x-icon" sizes="16x16 32x32 48x48">
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
            PROYECTO-ADP <b style="font-size: 10px;">v1.9.7</b>
        </a>
        <div>
            <!-- <button class="btn btn_zacamil btn-sm" type="submit"><span><i class="bi bi-wrench-adjustable-circle-fill"></i></span>
                Soporte.</button> -->
            <button class="btn btn_zacamil btn-sm" type="submit"><span><i class="bi bi-geo-alt-fill"></i></span> <?php echo $ip ?></button>
        </div>
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
                                    <input name="usuario" value="" class="form-control" placeholder="Nom.Ape@zacamil.com" type="text" required>
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
                                    <button type="submit" class="btn btn_zacamil btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="No olvides que el formato del correo es [@zacamil.sv]"><i class="bi bi-box-arrow-right"></i> Iniciar sesión</button>
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
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/slide_00002.png" class="d-block w-100" alt="...">
                                <!-- <img src="https://placehold.co/1000x500?text=MANUALES" class="d-block w-100" alt="..."> -->
                                <div class="carousel-caption d-none d-md-block">
                                    <!-- <p style="background-color: #21252950;">¿Tienes problemas a la hora de registrarte?</p> -->
                                    <form action="Controlador/ctr.documentos.php" method="post">
                                        <input type="hidden" name="numero_documento" value="1">
                                        <button class="btn btn-dark btn-sm" type="submit"><i class="bi bi-download"></i> DESCARGA 1/3</button>
                                    </form>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="img/slide_00003.png" class="d-block w-100" alt="...">
                                <!-- <img src="https://placehold.co/1000x500?text=MANUALES" class="d-block w-100" alt="..."> -->
                                <div class="carousel-caption d-none d-md-block">
                                    <!-- <p style="background-color: #21252950;">¿Tienes problemas a la hora de registrarte?</p> -->
                                    <form action="Controlador/ctr.documentos.php" method="post">
                                        <input type="hidden" name="numero_documento" value="2">
                                        <button class="btn btn-dark btn-sm" type="submit"><i class="bi bi-download"></i> DESCARGA 2/3</button>
                                    </form>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="img/slide_00004.png" class="d-block w-100" alt="...">
                                <!-- <img src="https://placehold.co/1000x500?text=MANUALES" class="d-block w-100" alt="..."> -->
                                <div class="carousel-caption d-none d-md-block">
                                    <!-- <p style="background-color: #21252950;">¿Tienes problemas a la hora de registrarte?</p> -->
                                    <form action="Controlador/ctr.documentos.php" method="post">
                                        <input type="hidden" name="numero_documento" value="3">
                                        <button class="btn btn-dark btn-sm" type="submit"><i class="bi bi-download"></i> DESCARGA 3/3</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <form class="modal-content" action="Controlador/ctr.usuarios.php" method="post" `name="RegistroUsuario">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><img src="img/logo_1_00001.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> REGISTRO USUARIO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- ------------------------------------------------------------------[CUERPO] -->
                <div class="modal-body">

                    <div class="input-group mb-3">
                        <span class="input-group-text icon_zacamil"><i class="bi bi-person"></i></span>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" name="primer_nombre" placeholder="" maxlength="15" minlength="2" required>
                            <label for="floatingInput">Primer Nombre <b class="importante_zacamil">*</b></label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" name="segundo_nombre" placeholder="" maxlength="15" minlength="2">
                            <label for="floatingInput">Segundo Nombre</label>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text icon_zacamil"><i class="bi bi-person"></i></span>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" name="primer_apellido" placeholder="" maxlength="15" minlength="3" required>
                            <label for="floatingInput">Primer Apellido <b class="importante_zacamil">*</b></label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" name="segundo_apellido" placeholder="" maxlength="15" minlength="3">
                            <label for="floatingInput">Segundo Apellido</label>
                        </div>
                    </div>
                    <?php //-----------------------------------------------------------------[CORREO] 
                    ?>
                    <div class="input-group mb-3">
                        <span class="input-group-text icon_zacamil"><i class="bi bi-envelope"></i></span>
                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatingInput" name="correo" placeholder="" maxlength="80" minlength="5" required>
                            <label for="floatingInput">Correo Electrónico <b class="importante_zacamil">*</b></label>
                        </div>
                    </div>

                    <?php //-----------------------------------------------------------------[TELEFONO] 
                    ?>
                    <div class="input-group mb-3">
                        <span class="input-group-text icon_zacamil"><i class="bi bi-telephone"></i></span>
                        <div class="form-floating">
                            <input type="number" class="form-control" id="floatingInput" name="telefono" placeholder="" pattern="\d{8}" maxlength="8" minlength="8" required>
                            <label for="floatingInput">Número de Teléfono <b class="importante_zacamil">*</b></label>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text icon_zacamil"><i class="bi bi-person-lines-fill"></i></span>
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelectDisabled" name="rol" aria-label="Floating label" required>
                                <option value="<?php echo encriptar('1'); ?>">Jefe de área</option>
                                <option value="<?php echo encriptar('2'); ?>">Técnico</option>
                            </select>
                            <label for="floatingSelectDisabled">Seleccionar Rol </label>
                        </div>
                    </div>

                    <!-- --------------------------------------------------------------[password] -->
                    <div class="input-group mb-3">
                        <span class="input-group-text icon_zacamil" id="pass1"><i class="bi bi-key"></i></span>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password1" name="password1" placeholder="" maxlength="16" minlength="8" oninput="verificar_passwords()">
                            <label for="password1">Contraseña</label>
                        </div>
                    </div>

                    <!-- --------------------------------------------------------------[password] -->
                    <div class="input-group mb-3">
                        <span class="input-group-text icon_zacamil" id="pass2"><i class="bi bi-key"></i></span>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password2" name="password2" placeholder="" maxlength="16" minlength="8" oninput="verificar_passwords()">
                            <label for="password2">Verfificar Contraseña</label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cancelar</button>
                    <button type="submit" id="btnregistrar" name="RegistroUsuario" class="btn btn-success btn-sm" disabled><i class="bi bi-check2-circle"></i> Registrar</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    $mensaje_sesion = isset($_GET['message']) ? $_GET['message'] : "";
    if (!empty($mensaje_sesion)) {
        $aes_private = desencriptarURL($mensaje_sesion);
        // $aes_private = '698L3Mmy6GFQgkmQJcCZ+Q==';
        $aes_public = desencriptar($aes_private);
        $cuenta_usuario = isset($_GET['usuario']) ? $_GET['usuario'] : "";

        // echo '<h1>'. $aes_private .'</h1>';
        // echo $aes_public;
        $titulo_alert = 'Zacamil';
        $text_alert = 'Zacamil que mas se puede decir';
        $icono_alert = 'info';
        $btntxt_alert = 'Aceptar';
        $btncolor_alert = '#01274e';
        $icono_color = '';
        $html = '';

        // $aes_public = 5;
        switch ($aes_public) {
            case 1:
                $titulo_alert = '¡Cuenta no encontrada!';
                $text_alert = 'Si no tiene cuenta puede crear una o verifique sus credenciales y que el correo tenga el siguiente formato: Ejemplo@zacamil.sv';
                $icono_alert = 'error';
                $btntxt_alert = 'Aceptar';
                $btncolor_alert = '#01274e';
                break;
            case 2:
                $titulo_alert = '¡Error en Contraseña!';
                $text_alert = 'No recuerda su contraseña, Active el modo recuperación en el siguiente enlace:';
                $html =  "";
                $icono_alert = 'error';
                $btntxt_alert = 'Aceptar';
                $btncolor_alert = '#01274e';
                break;
            case 3:
                $titulo_alert = '¡Error al enviar datos!';
                $text_alert = 'Datos dañados!, por un error interno, contáctese con el administrador';
                $icono_alert = 'warning';
                $btntxt_alert = 'Aceptar';
                $btncolor_alert = '#01274e';
                break;
            case 4:
                $titulo_alert = '¡Error al registrar!';
                $text_alert = 'No se pudo crear el usuario!, Por un error interno, contáctese con el administrador';
                $icono_alert = 'warning';
                $btntxt_alert = 'Aceptar';
                $btncolor_alert = '#01274e';
                break;
            case 5:
                $correo_seccion =  desencriptar(desencriptarURL(isset($_GET['usuario']) ? $_GET['usuario'] : ""));
                if (isset($correo_seccion) && !empty($correo_seccion)) {
                    $titulo_alert = '<strong style="color:#01274e;">Cuenta Registrada</u></strong>';
                    $text_alert = '';
                    $icono_alert = 'success';

                    $icono_color = "iconColor: '#01274e',";
                    $html = "html:'" . plantilla_cuenta_activada($correo_seccion) . "',";

                    $btntxt_alert = 'Aceptar';
                    $btncolor_alert = '#01274e';

                    // echo '<h1>'.$html.'</h1>';
                }
                break;
            case 6:
                $titulo_alert = '¡Cuenta no activa!';
                $text_alert = 'Recuerde que su cuenta sera activda por un administrador.';
                $icono_alert = 'warning';
                $btntxt_alert = 'Aceptar';
                $btncolor_alert = '#01274e';
                break;

            case 7:
                $correo_seccion =  desencriptar(desencriptarURL(isset($_GET['usuario']) ? $_GET['usuario'] : ""));
                $id_seccion =  desencriptar(desencriptarURL(isset($_GET['usr']) ? $_GET['usr'] : ""));

                if (isset($correo_seccion) && !empty($correo_seccion)) {
                    $titulo_alert = '¡Cuenta en modo recuperación!';
                    $text_alert = '';
                    $icono_alert = 'warning';

                    $icono_color = "iconColor: '#ffc107',";
                    $html = "html:'" . plantilla_cuenta_recuperacion($correo_seccion, $id_seccion) . "',";
                    $btntxt_alert = 'No Guardar';
                    $btncolor_alert = '#01274e';

                    // echo '<h1>'.$html.'</h1>';
                }
                break;

                $titulo_alert = '¡Cuenta en modo recuperación!';
                $text_alert = 'Cuenta en modo recuperación.';
                $icono_alert = 'warning';
                // $btntxt_alert = 'Aceptar';
                // $btncolor_alert = '#01274e';
                // break;

            case 8:
                $titulo_alert = '¡Cuenta bloqueada!';
                $text_alert = 'Un administrador bloqueo su cuenta.';
                $icono_alert = 'error';
                $btntxt_alert = 'Aceptar';
                $btncolor_alert = '#01274e';
                break;
            case 9:
                $titulo_alert = '¡Cuenta recuperada!';
                $text_alert = 'Ahora puede iniciar sección.';
                $icono_alert = 'success';
                $btntxt_alert = 'Aceptar';
                $btncolor_alert = '#01274e';
                break;
        }
    ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                setTimeout(function() {
                    Swal.fire({
                        title: '<?php echo $titulo_alert ?>',
                        text: '<?php echo $text_alert ?>',
                        icon: '<?php echo $icono_alert ?>',
                        <?php echo $icono_color ?>
                        <?php echo $html ?>
                        confirmButtonText: '<?php echo $btntxt_alert ?>', // Cambia el texto del botón de confirmación
                        confirmButtonColor: '<?php echo $btncolor_alert ?>', // Cambia el color de fondo del botón de confirmación
                    });
                }, 3000);
            });
        </script>

    <?php
    }
    ?>
</body>

<script>
    function verificar_passwords() {
        const password1 = document.getElementById("password1").value;
        const password2 = document.getElementById("password2").value;
        const icon01 = document.getElementById("pass1");
        const icon02 = document.getElementById("pass2");
        const submitButton = document.getElementById("btnregistrar");

        if (password1 === password2) {
            // message.textContent = "Las contraseñas coinciden";
            icon01.classList.remove("icon_zacamil_red");
            icon01.classList.add("icon_zacamil");
            icon02.classList.remove("icon_zacamil_red");
            icon02.classList.add("icon_zacamil");

            submitButton.removeAttribute("disabled");
            // alert('funciona');
        } else {
            // message.textContent = "Las contraseñas no coinciden";
            icon01.classList.remove("icon_zacamil");
            icon01.classList.add("icon_zacamil_red");
            icon02.classList.remove("icon_zacamil");
            icon02.classList.add("icon_zacamil_red");

            submitButton.setAttribute("disabled", "true");
            // alert('no funciona');

        }
    }
</script>


<?php
function plantilla_cuenta_activada($correo)
{
    $plantilla = '<div class="input-group mb-3"><span class="input-group-text icon_zacamil">TU CORREO:</span><input type="text" value="' . $correo . '" id="correozacamil" class="form-control" aria-describedby="correozacamilhelp" readonly></div><div id="correozacamilhelp" class="form-text"><ol class="list-group list-group-numbered"><li class="list-group-item d-flex justify-content-between align-items-start"><div class="ms-2 me-auto">Usted iniciará sección con el correo de arriba y con la contraseña que digito en el registro anterior.</div><span class="badge bg-success rounded-pill">Importante</span></li><li class="list-group-item d-flex justify-content-between align-items-start"><div class="ms-2 me-auto">Debe esperar que su cuenta sea activada por un administrador.</div><span class="badge bg-success rounded-pill">Importante</span></li><li class="list-group-item d-flex justify-content-between align-items-start"><div class="ms-2 me-auto">No lo olvides copiar o guardar tu correo de usuario.</div><span class="badge bg-success rounded-pill">Importante</span></li></ol></div>';
    return $plantilla;
}

function plantilla_cuenta_recuperacion($correo, $usr)
{
    $plantilla = '<div class="input-group mb-3"><span class="input-group-text bg-warning">TU CORREO:</span><input type="text" value="' . $correo . '" id="correozacamil" class="form-control" aria-describedby="correozacamilhelp" readonly></div><div id="correozacamilhelp" class="form-text"><ol class="list-group list-group-numbered"><li class="list-group-item d-flex justify-content-between align-items-start"><div class="ms-2 me-auto">Debera digitar una nueva contraseña.</div><span class="badge bg-warning rounded-pill">Importante</span></li><li><form class="" action="Controlador/ctr.login.php" method="post" name="cambiarpassword"><input value="' . $usr . '" type="hidden" class="form-control" id="id_usr" name="id_usr"><div class="input-group mb-3"><span class="input-group-text bg-warning" id="pass1"><i class="bi bi-key"></i></span><div class="form-floating"><input type="text" class="form-control" id="password" name="password" placeholder="" maxlength="16" minlength="8"><label for="password1">Contraseña</label></div></div><button class="btn btn-success btn-sm" type="submit">Guardar nueva contraseña</button></form></li></ol></div>';
    return $plantilla;
}
?>

</html>