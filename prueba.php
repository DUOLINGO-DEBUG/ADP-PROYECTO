<!DOCTYPE html>
<html lang="en">

<head>
    <title>ZACAMIL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- ----------------------------------------------------------------------------------------------CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- ----------------------------------------------------------------------------------------------JS -->
    <script src="js/animacion.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/Jquery/jquery-3.7.1.min.js"></script>
    <script src="js/sweetalert2/sweetalert2.all.min.js"></script>


</head>

<body>

    <?php
    $numero = 5;

    for ($i = 0; $i < 5; $i++) {
        $id_usuario = 'US' . $i;
    ?>
        <!-- Botones para abrir modales -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?php echo $id_usuario; ?>">
            Abrir Modal <?php echo $id_usuario; ?>
        </button>

        Modales
        <div class="modal fade" id="<?php echo $id_usuario; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $id_usuario; ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="<?php echo $id_usuario; ?>">Modal <?php echo $i; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            
                            <div class="input-group mb-3">
                                <span class="input-group-text icon_zacamil"><i class="bi bi-person"></i></span>
                                <div class="form-floating">
                                    <input value="<?php echo 'Jonnathan;' ?>" type="text" class="form-control" id="floatingInput" name="primer_nombre" placeholder="" maxlength="15" minlength="5" required="">
                                    <label for="floatingInput">Nombres <b class="importante_zacamil">*</b></label>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text icon_zacamil"><i class="bi bi-person"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInput" name="primer_apellido" placeholder="" maxlength="15" minlength="5" required="">
                                    <label for="floatingInput">Apellidos<b class="importante_zacamil">*</b></label>
                                </div>
                            </div>
                            <!-- --------------------------------------------------------------[correo] -->
                            <div class="input-group mb-3">
                                <span class="input-group-text icon_zacamil"><i class="bi bi-envelope"></i></span>
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="floatingInput" name="correo" placeholder="" maxlength="80" minlength="5" required="">
                                    <label for="floatingInput">Correo Electrónico <b class="importante_zacamil">*</b></label>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text icon_zacamil"><i class="bi bi-envelope"></i></span>
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="floatingInput" name="correo_Zacamil" placeholder="" maxlength="80" minlength="5" required="">
                                    <label for="floatingInput">Correo de usuario <b class="importante_zacamil">*</b></label>
                                </div>
                            </div>

                            <!-- --------------------------------------------------------------[telefono] -->
                            <div class="input-group mb-3">
                                <span class="input-group-text icon_zacamil"><i class="bi bi-telephone"></i></span>
                                <div class="form-floating">
                                    <input readonly type="number" class="form-control" id="floatingInput" name="telefono" placeholder="" pattern="\d{8}" maxlength="8" minlength="8" required="">
                                    <label for="floatingInput">Número de Teléfono <b class="importante_zacamil">*</b></label>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text icon_zacamil"><i class="bi bi-telephone"></i></span>
                                <div class="form-floating">
                                    <input value="2023-11-01" type="date" class="form-control" id="floatingInput" name="telefono" placeholder="" pattern="\d{8}" maxlength="8" minlength="8" required="">
                                    <label for="floatingInput">Fecha de Creación <b class="importante_zacamil">*</b></label>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text icon_zacamil"><i class="bi bi-person-lines-fill"></i></span>
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelectDisabled" name="rol" aria-label="Floating label" required="">
                                        <option value="m7lN6UoYY2NJsVPZdJbhxA==">Jefe de área</option>
                                        <option value="Wb8+0ybERMOXtGUBEIeAcg==">Técnico</option>
                                    </select>
                                    <label for="floatingSelectDisabled">Rol de usuario</label>
                                </div>
                            </div>

                            

                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
    ?>
    <div>
        <h1>XDDDDDDDDDDDDDDDDs</h1>
    </div>

</body>

</html>