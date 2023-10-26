<?php
// Iniciar sesión
session_start();

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión o a la página principal del sitio web
header("Location: ../../");
exit();
?>