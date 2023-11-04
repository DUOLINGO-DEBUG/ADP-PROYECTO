<!DOCTYPE html>
<html lang="en">

<head>
    <title>Técnico</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- ----------------------------------------------------------------------------------------------CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- ----------------------------------------------------------------------------------------------JS -->
    <script src="../../js/animacion.js"></script>
    <script src="../../js/bootstrap/bootstrap.min.js"></script>
    <script src="../../js/Jquery/jquery-3.7.1.min.js"></script>
    <script src="../../js/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="../../js/"></script>
</head>

<?php

$rol_usuario = 'Técnico -';
require_once('../00-utilidades/session.php');
require_once('../00-utilidades/preloader.php');
require_once('../00-utilidades/nav.php');

if (!isset($_SESSION["Id_Usuario"])) {
    // header("Location: ../../");
    exit();
} else {
    include('../../Modelo/Modelo.usuarios.php');
    $usuario = new Usuario();
    $usuarios = $usuario->Listar_Usuarios();

    include('../../Modelo/Modelo.reportes.php');
    $reporte = new Reporte();
    $reportes = $reporte->Listar_Reportes();
}

?>

<body>
    <br>
    <div class="container">
        <!-- Pestañas -->
        <ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Listado Reportes</a>
            </li>
        </ul>

        <!-- Contenido de las pestañas -->
        <div class="tab-content bg-white" id="myTabsContent">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Área</th>
                                <th>Correo Usuario</th>
                                <th>Estado</th>
                                <th>Progreso</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Laptop con pantalla rota</td>
                                <td>Área de Desarrollo</td>
                                <td>Maria.Gracias@zacamil.sv</td>
                                <td><i class="bi bi-square-fill"></i></td>
                                <td><button class="btn btn_zacamil">Ver Progreso</button></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>PS3 no da imagen.</td>
                                <td>Área de Desarrollo</td>
                                <td>Anderson.Guila@zacamil.sv</td>
                                <td><i class="bi bi-square-fill"></i></td>
                                <td><button class="btn btn_zacamil">Ver Progreso</button></td>
                            </tr>
                            <!-- Puedes agregar más filas según sea necesario -->
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- ---------------------------------------------------------------------------- -->
            <!-- REPORTES LISTA -->
            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
            </div>
            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
            </div>
        </div>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>