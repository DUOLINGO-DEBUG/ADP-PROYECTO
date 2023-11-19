<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="../../img/logo_1_00001.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            PROYECTO ADP
        </a>
        <div>
            <button class="btn btn_zacamil btn-sm" type="submit"><span><i class="bi bi-person-check"></i> <?php echo (isset($rol_usuario) ? $rol_usuario : "Usuario -") . ' ' . $_SESSION['Nombre_Usuario'] ?></span disabled></button>
            <button class="btn btn_zacamil btn-sm" type="submit"><span><i class="bi bi-wrench-adjustable-circle-fill"></i></span>
                Soporte</button>
            <a class="btn btn_zacamil btn-sm" type="submit" href="../00-utilidades/nosession.php">
                Salir <span><i class="bi bi-box-arrow-right"></i></span></a>
        </div>

    </div>
</nav>
