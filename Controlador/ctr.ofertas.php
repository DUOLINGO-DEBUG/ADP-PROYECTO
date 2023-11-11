<?php
$rutas = ((isset($ruta) ? $ruta : ""));
require_once($rutas . '../Modelo/Modelo.reportes.php');
require_once('ctr.encriptacion.php');
require_once('ctr.time.php');

function estadisticas_mes($mes, $opcion)
{
    $reportes_estadisticas = new Reporte();
    switch ($opcion) {
        case 1:
            $ofertas_finalizadas = $reportes_estadisticas->Listar_Reportes_dia_activos($mes);
            break;
        case 2:
            $ofertas_finalizadas = $reportes_estadisticas->Listar_Reportes_dia_rechazados($mes);
            break;
        case 3:
            $ofertas_finalizadas = $reportes_estadisticas->Listar_Reportes_dia($mes);
            break;
        case 4:
            $ofertas_finalizadas = $reportes_estadisticas->Listar_Reportes_anual();
            break;
        default:
            $ofertas_finalizadas = array(
                array('dia' => '2023-' . $mes . '-01', 'cantidad_de_reportes' => '0')
            );
            break;
    }

    return $ofertas_finalizadas;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['RegistroOferta'])) {
    

    $tipo_form = isset($_POST['tipo_form']) ? $_POST['tipo_form'] : "";
    $id_usuario_Admin = desencriptar(desencriptarURL(isset($_POST['id_usuario_Admin']) ? $_POST['id_usuario_Admin'] : ""));

    $id_usuario_reporte = desencriptar(desencriptarURL(isset($_POST['id_usuario_reporte']) ? $_POST['id_usuario_reporte'] : ""));
    $nombre_equipo_reporte = isset($_POST['nombre_equipo_reporte']) ? $_POST['nombre_equipo_reporte'] : "";
    $marca_equipo_reporte = isset($_POST['marca_equipo_reporte']) ? $_POST['marca_equipo_reporte'] : "";
    $modelo_equipo_reporte = isset($_POST['modelo_equipo_reporte']) ? $_POST['modelo_equipo_reporte'] : "";
    $area_equipo_reporte = isset($_POST['area_equipo_reporte']) ? $_POST['area_equipo_reporte'] : "";
    $serial_equipo_reporte = isset($_POST['serial_equipo_reporte']) ? $_POST['serial_equipo_reporte'] : "";
    $descripcion_causante_reporte = isset($_POST['descripcion_causante_reporte']) ? $_POST['descripcion_causante_reporte'] : "";
    $descripcion_consecuencia_reporte = isset($_POST['descripcion_consecuencia_reporte']) ? $_POST['descripcion_consecuencia_reporte'] : "";

    $anexo_reporte = isset($_POST['anexo_reporte']) ? $_POST['anexo_reporte'] : "";
    $tecnico_reporte = desencriptar(desencriptarURL(isset($_POST['rol']) ? $_POST['rol'] : ""));

    $estado_reporte = 4;
    $tiempo_reporte_c = Obtner_Fecha_sv() . ' ' . Obtener_Hora_sv();
    $tiempo_reporte_f = null;

    // echo '[+] ' . $id_usuario_reporte . '<br>' .
    //     $nombre_equipo_reporte . '<br>' .
    //     $marca_equipo_reporte . '<br>' .
    //     $modelo_equipo_reporte . '<br>' .
    //     $area_equipo_reporte . '<br>' .
    //     $serial_equipo_reporte . '<br>' .
    //     $descripcion_causante_reporte . '<br>' .
    //     $descripcion_consecuencia_reporte . '<br>' .
    //     $anexo_reporte . '<br>' .
    //     $tecnico_reporte . '<br>' .
    //     $estado_reporte . '<br>' .
    //     $tiempo_reporte_c . '<br>' .
    //     $tiempo_reporte_f . '<br>';

    // echo '[+] ' . $id_usuario_reporte . '<br>' . $id_usuario_Admin . '<br>' . $tecnico_reporte . '<br>' . $tiempo_reporte_c . '<br>' . 3 . '<br>' . $anexo_reporte;

    $reportes_usuario = new Reporte;

    if ($tipo_form == 0) {
        
        $reportes_usuario->setUsuario_usuario($id_usuario_reporte);
        $reportes_usuario->setnombreEquipo_reporte($nombre_equipo_reporte);
        $reportes_usuario->setmarca_reporte($marca_equipo_reporte);
        $reportes_usuario->setmodelo_reporte($modelo_equipo_reporte);
        $reportes_usuario->setarea_reporte($area_equipo_reporte);
        $reportes_usuario->setserial_reporte($serial_equipo_reporte);
        $reportes_usuario->setdescripcionIncidente_reporte($descripcion_causante_reporte);
        $reportes_usuario->setdescripcionError_reporte($descripcion_consecuencia_reporte);
        // $reportes_usuario->setanexo_reporte($anexo_reporte);
        $reportes_usuario->setestado_reporte($estado_reporte);
        $reportes_usuario->setFechaCreacion($tiempo_reporte_c);
        // $reportes_usuario->setFechaFinalizacion($tiempo_reporte_f);

        $registro_oferta = $reportes_usuario->Registrar_Reportes();

        if ($registro_oferta == true) {
            $aes_private01 = encriptar("1");
            header('Location: ../Vista/03-Administrador/index.php?message=' . $aes_private01);
            // include_once('');
            exit;
        } else {
            $aes_private01 = encriptar("2");
            header('Location: ../Vista/03-Administrador/index.php?message=' . $aes_private01);
            exit;
        }
    } else {

        $registro_ofertas_asignacion = $reportes_usuario->Asignar_reporte($id_usuario_reporte, $id_usuario_Admin, $tecnico_reporte, $tiempo_reporte_c, 3);
        $registro_editar_oferta = $reportes_usuario->editar_oferta($id_usuario_reporte, $anexo_reporte, 3);

        if (($registro_ofertas_asignacion == true) && ($registro_editar_oferta == true)) {
            $aes_private01 = encriptar("1");
            header('Location: ../Vista/03-Administrador/index.php?message=' . $aes_private01);
            // include_once('');
            exit;
        } else {
            $aes_private01 = encriptar("2");
            header('Location: ../Vista/03-Administrador/index.php?message=' . $aes_private01);
            exit;
        }
        
    }
}
