<script src="js/sweetalert2/sweetalert2.all.min.js"></script>


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

<body class="">
    <section class="pt-5 pb-5 mt-2 align-items-center d-flex" style="min-height: 10px;">
        <div class="container bg-white">
            <div class="input-group mb-3">
                <span class="input-group-text icon_zacamil">TU CORREO DE USUARIO:</span>
                <input type="text" value="example.example@zacamil.sv" id="correozacamil" class="form-control" aria-describedby="correozacamilhelp" readonly>
            </div>

            <div id="correozacamilhelp" class="form-text">

                <ol class="list-group list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            Con este correo iniciaras sección y con la contraseña que usted asigno, Cuando su cuenta ya hay sido activada.
                        </div>
                        <span class="badge bg-success rounded-pill">Importante</span>

                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            Debe esperar menos de <b>12h</b>, Para activar su cuenta o contacte con los administradores.
                        </div>
                        <span class="badge bg-success rounded-pill">Importante</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                           No lo olvides copiarlo y guardarlo.
                        </div>
                        <span class="badge bg-success rounded-pill">Importante</span>
                    </li>
                </ol>

            </div>

            
            <br>
        </div>
    </section>
</body>
<script>
    setTimeout(function() {

        Swal.fire({

            title: '<strong style="color:#01274e;">Cuenta Registrada</u></strong>',
            icon: 'success',
            
            text: '0000-0000',
            html: 'xdddddddddddddd',
            iconColor: '#01274e',
            html: '<label for="correozacamil" class="form-label">TU CORREO DE USUARIO</label>' +
                '<input type="text"  value="example.example@zacamil.sv" id="correozacamil" class="form-control" aria-describedby="correozacamilhelp" readonly>' +
                '',


            showCloseButton: true,
            showCancelButton: true,

            // confirmButtonText
            // confirmButtonColor
        })



    }, 3000);
</script>