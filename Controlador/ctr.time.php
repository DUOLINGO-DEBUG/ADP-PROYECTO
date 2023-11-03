<?php
function Obtner_Fecha_sv() {
    // Establece la zona horaria a El Salvador
    date_default_timezone_set('America/El_Salvador');

    // Obtiene la fecha actual en El Salvador
    $fecha = date('Y-m-d'); // Formato: año-mes-día

    return $fecha;
}

function Obtener_Hora_sv() {
    date_default_timezone_set('America/El_Salvador');
    $hora = date('H:i:s');

    return $hora;
}

// prueba
// $fechaElSalvador = Obtner_Fecha_sv();
// $horaElSalvador = Obtener_Hora_sv();
// echo "DataTime en El Salvador: ('$fechaElSalvador $horaElSalvador')";
