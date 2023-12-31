<?php
require('../Modelo/Modelo.usuarios.php');
require('ctr.encriptacion.php');

session_start();
if (isset($_POST['usuario']) && isset($_POST['password'])) {
    $email = $_POST['usuario'];
    $password = $_POST['password'];

    echo '' . $email . $password;
    // sleep(10);
    $usuario = new Usuario;
    $usuario->obtenerContra($email);
    $hashPassword = $usuario->getPasswordUsuario();
    $id_usuario_login = $usuario->getIdUsuario();

    if ($usuario->getEstadoEstados() == 1) {

        if ($usuario->getPasswordUsuario() == false) {
            $aes_private = encriptar("1");
            // $aes_private = encriptar("waza");
            header('Location: ../index.php?message=' . $aes_private);
            exit;
        } else {
            // if(password_verify($password, $hashPassword)){
            if (password_verify($password, $hashPassword)) {
                $usuario->inicioSesion($email, $password);

                $_SESSION['Id_Usuario'] = $usuario->getIdUsuario();
                $_SESSION['Usuario_Usuario'] = $usuario->getUsuarioUsuario();
                $_SESSION['Nombre_Usuario'] = $usuario->getNombreUsuario();
                $_SESSION['Apellido_Usuario'] = $usuario->getApellidoUsuario();
                $_SESSION['Correo_Usuario'] = $usuario->getCorreoUsuario();
                $_SESSION['Telefono_Usuario'] = $usuario->getTelefonoUsuario();
                $_SESSION['Password_Usuario'] = $usuario->getPasswordUsuario();
                $_SESSION['Fecha_Creacion_Usuario'] = $usuario->getFechaCreacion();
                $_SESSION['Estado_Estados'] = $usuario->getEstadoEstados();
                $_SESSION['BP_Usuario'] = $usuario->getBpUsuario();
                $_SESSION['Cargo_Cargos'] = $usuario->getCargoCargos();

                if ($_SESSION['Cargo_Cargos'] == 1) {
                    header('Location: ../Vista/01-Jefe de area/index.php');
                } else if ($_SESSION['Cargo_Cargos'] == 2) {
                    header('Location: ../Vista/02-Tecnico/index.php');
                } else if ($_SESSION['Cargo_Cargos'] == 3) {
                    header('Location: ../Vista/03-Administrador/index.php');
                }
            } else {
                $aes_private = encriptar("2");
                // $aes_private = encriptar("waza");
                header('Location: ../index.php?message=' . $aes_private);
                exit;
                //sleep(3);
            }
        }
    } else {

        switch ($usuario->getEstadoEstados()) {
            case 2:
                $aes_private = encriptar("8");
                break;
            case 3:
                $aes_private01 = encriptar("7");
                $aes_private02 = encriptar($email);
                $aes_private03 = encriptar($id_usuario_login);
                header('Location: ../index.php?message=' . $aes_private01 . '&usuario=' . $aes_private02 . '&usr=' . $aes_private03);
                exit;
                break;
            case 4:
                $aes_private = encriptar("6");
                break;
            default:
                $aes_private = encriptar("1");
                break;
        }
        // $aes_private = encriptar("waza");
        echo $usuario->getEstadoEstados();
        header('Location: ../index.php?message=' . $aes_private);
        exit;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_usr'])) {
    $usr = $_POST['id_usr'];  
    $password = $_POST['password'];

    $hash_contrasena = password_hash($password, PASSWORD_DEFAULT);

    $usuario_pwd = new Usuario;
    $cambio_pasword = $usuario_pwd->Cambio_password($hash_contrasena, 1, $usr);

    if ($cambio_pasword == true) {
        $aes_private01 = encriptar("9");
        header('Location: ../index.php?message=' . $aes_private01);
        exit;
    } else {
        header('Location: ../index.php');
        exit;
    }
}

    
