<?php

$clave = 'UM201481';

function encriptar($dato)
{
    global $clave;
    //PARAMETROS DEL ENCRYPT
    $cypherMethod = 'AES-256-CBC';
    $key = $clave;
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cypherMethod));
    $encryptedData = openssl_encrypt($dato, $cypherMethod, $key, $options = 0, $iv);
    return $encryptedData;
}

function desencriptar($dato)
{
    global $clave;
    //PARAMETROS DEL ENCRYPT
    $cypherMethod = 'AES-256-CBC';
    $key = $clave;
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cypherMethod));
    $decryptedData = openssl_decrypt($dato, $cypherMethod, $key, $options = 0, $iv);

    return $decryptedData;
}
