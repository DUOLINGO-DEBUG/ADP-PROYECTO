<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de SweetAlert2</title>
    <script src="js/sweetalert2/sweetalert2.all.min.js"></script>

</head>


<body>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: '¡Cuenta no encontrada!',
                text: 'Si no tiene cuenta puede crear una o verifique sus credenciales y que el correo tenga el siguiente formato: --------@zacamil.sv',
                icon: 'error',
                confirmButtonText: 'Aceptar', // Cambia el texto del botón de confirmación
                confirmButtonColor: '#01274e', // Cambia el color de fondo del botón de confirmación
            });
        });
    </script>
</body>

</html>