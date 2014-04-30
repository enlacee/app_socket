<?php
/**
 * Cliente
 * Enviara datos hacia el servidor (nuve).
 * Conexion por (this socket cliente) a traves de:
 * cofiguracion ideal
 * IP = 190.187.26.210
 * Puerto = 81
 */

//$client = stream_socket_client("tcp://$addr:80", $errno, $errorMessage);
$client = stream_socket_client("tcp://190.187.26.210:1337", $errno, $errorMessage);
 
if ($client === false) {
    throw new UnexpectedValueException("Failed to connect: $errorMessage");
}

/* Enviar más información fuera de banda. */
$FALG = stream_socket_sendto($client, "PARAMETRO 123 ", STREAM_OOB);
//$FALG = stream_socket_sendto($client, "PARAMETRO 321 ", STREAM_OOB);

ECHO "flag = "; var_dump($FALG);

//fwrite($client, "GET / HTTP/1.0\r\nHost: www.example.com\r\nAccept: */*\r\n\r\n");
//echo stream_get_contents($client);
fclose($client);