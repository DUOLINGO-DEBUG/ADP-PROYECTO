<?php
require_once($rutas . '../Modelo/Modelo.Progreso.php');
require_once('ctr.encriptacion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['RegistrarProgreso'])) {
    $id_reporte_progreso = desencriptar(desencriptarURL(isset($_POST['id_reporte_progreso']) ? $_POST['id_reporte_progreso'] : ""));
    $titulo_progreso = isset($_POST['titulo_progreso']) ? $_POST['titulo_progreso'] : "";
    $descripcion_progreso = isset($_POST['descripcion_progreso']) ? $_POST['descripcion_progreso'] : "";
    $porcentaje_progreso = isset($_POST['porcentaje_progreso']) ? $_POST['porcentaje_progreso'] : "";
    $fecha_progreso = isset($_POST['fecha_progreso']) ? $_POST['fecha_progreso'] : "";



//echo $id_reporte_progreso . $titulo_progreso . $descripcion_progreso . $porcentaje_progreso . $fecha_progreso;

    $Progreso_Tecnico = new Progreso;
    $Progreso_Tecnico->setReporteReportes($id_reporte_progreso);
    $Progreso_Tecnico->setTituloProgreso($titulo_progreso);
    $Progreso_Tecnico->setDescripcionProgreso($descripcion_progreso);
    $Progreso_Tecnico->setPorcentajeProgreso($porcentaje_progreso);
    $Progreso_Tecnico->setFechaProgreso($fecha_progreso);

    $registro_de_progreso = $Progreso_Tecnico->Registrar_progreso();

    $aes_private01 = encriptar($id_reporte_progreso);
    header('Location: ../Vista/02-Tecnico/reporte.php?report=' . $aes_private01);
}
