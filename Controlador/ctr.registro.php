<?php
    $rutas = ((isset($ruta) ? $ruta : ""));

include($rutas.'../Modelo/Modelo.Aregistros.php');
include($rutas.'../Modelo/Modelo.Asignaciones.php');
// 

function obtener_registros(){
   
    $registros_admin = new Registros;
    $registros_administrador = $registros_admin->Registros_administrador();
    return $registros_administrador;
}

function obtener_asignaciones(){
    $registros_asignaciones = new Asignaciones;
    $registros_asig = $registros_asignaciones->Listar_Asignaciones();
    return $registros_asig;
}

?>