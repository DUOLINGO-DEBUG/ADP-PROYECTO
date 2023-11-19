<?php
date_default_timezone_set('America/El_Salvador');

function Obtner_Fecha_sv()
{
    $fecha = date('Y-m-d'); 
    return $fecha;
}

function Obtener_Hora_sv()
{
    $hora = date('H:i:s');
    return $hora;
}

function formatearFecha($fechaHora) {

    $fecha = new DateTime($fechaHora);
    $fechaFormateada = $fecha->format('Y-m-d h:i A');

    return $fechaFormateada;
}

// prueba
// $fechaElSalvador = Obtner_Fecha_sv();
// $horaElSalvador = Obtener_Hora_sv();
// echo "DataTime en El Salvador: ('$fechaElSalvador $horaElSalvador')";
