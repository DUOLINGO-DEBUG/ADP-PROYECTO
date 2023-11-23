<!doctype html>
<html lang="es">

<?php
$ip = file_get_contents('https://api.ipify.org');
// $ip = '192.168.0.1';
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

<body>
    <div class="input-group mb-3"><span class="input-group-text bg-warning">TU CORREO:</span><input type="text" value="' . $correo . '" id="correozacamil" class="form-control" aria-describedby="correozacamilhelp" readonly></div>
    <div id="correozacamilhelp" class="form-text">
        <ol class="list-group list-group-numbered">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">Debera digitar una nueva contraseña.</div><span class="badge bg-warning rounded-pill">Importante</span>
            </li>
            <li>
                <form class="" action="../../Controlador/ctr.login.php" method="post" name="cambiarpassword">
                <input value="' . $correo . '" type="hidden" class="form-control" id="id_usr" name="id_usr">
                    
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-warning" id="pass1"><i class="bi bi-key"></i></span>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="password" name="password" placeholder="" maxlength="16" minlength="8">
                            <label for="password">Contraseña</label>
                        </div>
                    </div>
                    
                </form>
            </li>
        </ol>
    </div>
</body>