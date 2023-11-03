<?php
$clave = 'UM201481';
function encriptar($dato)
{
    global $clave;
    //PARAMETROS DEL ENCRYPT
    $cypherMethod = 'AES-256-CBC';
    $key = $clave;
    $iv = 1111729639231111;

    // $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cypherMethod));
    $encryptedData = openssl_encrypt($dato, $cypherMethod, $key, $options = 0, $iv);

    return $encryptedData;
}

function desencriptar($dato)
{
    global $clave;
    $cypherMethod = 'AES-256-CBC';
    $key = $clave;
    $iv = 1111729639231111;
    $decryptedData = openssl_decrypt($dato, $cypherMethod, $key, $options = 0, $iv);

    return $decryptedData;
}

function desencriptarURL($cadena) {
    return str_replace(' ', '+', $cadena);
}
// 698L3Mmy6GFQgkmQJcCZ+Q==
// 698L3Mmy6GFQgkmQJcCZ+Q==
// $aes_private = encriptar("<script>alert('No se encontro el usuario')</script>");
// $aes_public = desencriptar($aes_private);
// $aes_public = desencriptar($aes_private);


// echo '' . $aes_private . '[+]' . $aes_public;
// echo "Versión de PHP: " . phpversion();              
