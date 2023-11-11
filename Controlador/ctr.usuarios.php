<?php
require_once('ctr.encriptacion.php');
require_once('ctr.time.php');
require_once('../Modelo/Modelo.usuarios.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['RegistroUsuario'])) {


    // ---------------------------------------------------------------[POST]
    $nombre01_usuario = isset($_POST['primer_nombre']) ? $_POST['primer_nombre'] : "";
    $nombre02_usuario = isset($_POST['segundo_nombre']) ? $_POST['segundo_nombre'] : "";
    $apellido01_usuario = isset($_POST['primer_apellido']) ? $_POST['primer_apellido'] : "";
    $apellido02_usuario = isset($_POST['segundo_apellido']) ? $_POST['segundo_apellido'] : "";
    $correo_usuario = isset($_POST['correo']) ? $_POST['correo'] : "";
    $telefono_usuario = isset($_POST['telefono']) ? $_POST['telefono'] : "";
    $rol_usuario = desencriptar(desencriptarURL(isset($_POST['rol']) ? $_POST['rol'] : ""));
    $password01 = isset($_POST['password1']) ? $_POST['password1'] : "";

    // echo  $nombre01_usuario . $nombre02_usuario . $apellido01_usuario . $apellido02_usuario . $correo_usuario .$telefono_usuario . $rol_usuario . $password01;
    if (
        ($rol_usuario == 1 || $rol_usuario == 2)
        && $nombre01_usuario !== ""
        && $apellido01_usuario !== ""
        && $correo_usuario !== ""
        && $telefono_usuario !== ""
        && $password01 !== ""
    ) {

        $cuenta_zacamil = strtolower($nombre01_usuario . '.' . $apellido01_usuario . '@zacamil.sv');
        $tiempo_usuario = Obtner_Fecha_sv() . ' ' . Obtener_Hora_sv();
        $hash_contrasena = password_hash($password01, PASSWORD_DEFAULT);

        $cuenta_usuario = new Usuario;
        $cuenta_usuario->setNombreUsuario($nombre01_usuario . ' ' . $nombre02_usuario);
        $cuenta_usuario->setApellidoUsuario($apellido01_usuario . ' ' . $apellido02_usuario);
        $cuenta_usuario->setCorreoUsuario($correo_usuario);
        $cuenta_usuario->setUsuarioUsuario($cuenta_zacamil);
        $cuenta_usuario->setTelefonoUsuario($telefono_usuario);
        $cuenta_usuario->setPasswordUsuario($hash_contrasena);
        $cuenta_usuario->setFechaCreacion($tiempo_usuario);
        $cuenta_usuario->setEstadoEstados(4);
        $cuenta_usuario->setBpUsuario(0);
        $cuenta_usuario->setCargoCargos($rol_usuario);

        // echo $cuenta_usuario->getNombreUsuario() .
        //     $cuenta_usuario->getApellidoUsuario() .
        //     $cuenta_usuario->getCorreoUsuario() .
        //     $cuenta_usuario->getUsuarioUsuario() .
        //     $cuenta_usuario->getTelefonoUsuario() .
        //     $cuenta_usuario->getFechaCreacion() .
        //     $cuenta_usuario->getEstadoEstados() .
        //     $cuenta_usuario->getBpUsuario() .
        //     $cuenta_usuario->getCargoCargos();

        // echo "Contraseña encriptada: " . $hash_contrasena .' ['.$password01.']';

        $registro_usuario = $cuenta_usuario->registrar_usuario();

        if ($registro_usuario == true) {
            $aes_private01 = encriptar("5");
            $aes_private02 = encriptar($cuenta_usuario->getUsuarioUsuario());
            header('Location: ../index.php?message=' . $aes_private01 . '&usuario=' . $aes_private02);
            exit;
        } else {
            echo $registro_usuario;
            $aes_private = encriptar("4");
            header('Location: ../index.php?message=' . $aes_private);
            exit;
        }
    } else {
        $aes_private = encriptar("3");
        header('Location: ../index.php?message=' . $aes_private);
        exit;
    }
}

if (isset($_POST['userId']) && isset($_POST['customData']) && isset($_POST['admin'])) {
    $userId = desencriptar($_POST['userId']);
    $customData = desencriptar($_POST['customData']);
    $admin_id = desencriptar($_POST['admin']);

    $cuenta_usuario = new Usuario;
    $mensaje = '';
    $tiempo_usuario = Obtner_Fecha_sv() . ' ' . Obtener_Hora_sv();

    switch ($customData) {
        case 101:
            $accion_user = 1;
            $cuenado_modificada = $cuenta_usuario->Modificar_Usuarios(1, $userId);
            // $registro_Admin = $correo_usuario->Registro_usuarios($userId, $admin_id, 1, $tiempo_usuario);
            $registro_Admin = $cuenta_usuario->Registro_Usuarios_Admin($userId, $admin_id, 1, $tiempo_usuario);
            $mensaje = 'Cuenta activada';
            break;
        case 102:
            $accion_user = 2;
            $cuenado_modificada = $cuenta_usuario->Modificar_Usuarios(2, $userId);
            $registro_Admin = $cuenta_usuario->Registro_Usuarios_Admin($userId, $admin_id, 2, $tiempo_usuario);
            $mensaje = 'Cuenta desactivada';

            break;
        case 103:
            $accion_user = 3;
            $cuenado_modificada = $cuenta_usuario->Modificar_Usuarios(3, $userId);
            $registro_Admin = $cuenta_usuario->Registro_Usuarios_Admin($userId, $admin_id, 3, $tiempo_usuario);
            $mensaje = 'Cuenta en recuperación';

            break;
        case 104:
            $accion_user = 4;
            $cuenado_modificada = $cuenta_usuario->Modificar_Usuarios(4, $userId);
            $registro_Admin = $cuenta_usuario->Registro_Usuarios_Admin($userId, $admin_id, 4, $tiempo_usuario);
            $mensaje = 'Cuenta nueva';
            break;
        default:
            break;
    }

    if ($cuenado_modificada) {
        echo "Mensaje ==>" . $mensaje;

        // $response = array(
        //     'accion' => $accion_user
        // );

        // var_dump($array);
        // header('Content-Type: application/json');
        // echo json_encode($response);
    } else {
        echo "[+] error base de datos";
    }
}

// echo 'waza';