<?php

$documento = isset($_POST['numero_documento']) ? $_POST['numero_documento'] : "";
$rutaArchivo = '';
switch ($documento) {
    case 1:
        $rutaArchivo = 'documentos/[MANUAL] Registro de Usuario.pdf';
        break;
    case 2:
        $rutaArchivo = 'documentos/[MANUAL] Jefe de Área.pdf';
        break;
    case 3:
        $rutaArchivo = 'documentos/[MANUAL] Técnico.pdf';
        break;
    default:
        $rutaArchivo = '';
        break;
}


// Verificar si el archivo existe
if (file_exists($rutaArchivo)) {
    // Configurar encabezados para la descarga
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename=' . basename($rutaArchivo));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($rutaArchivo));

    // Leer el archivo y enviarlo al navegador
    readfile($rutaArchivo);
    exit;
} else {
    // Manejar el caso en el que el archivo no existe
    echo 'El archivo no existe.';
}
