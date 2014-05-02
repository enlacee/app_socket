<?php
/**
 * Servidor
 * Este escrip actuara como un demonio, escuchara las peticiones del cliente
 * conexion (this socket servidor)
 * cofiguracion ideal
 * IP = 190.187.26.210
 * Puerto = 81
 */

# server.php
$server = stream_socket_server("tcp://0.0.0.0:82", $errno, $errorMessage);

if ($server === false) {
    throw new UnexpectedValueException("Could not bind to socket: $errorMessage");
}

for (;;) {
    $client = @stream_socket_accept($server);

    if ($client) {
        $serial = fread($client, 1500);
        
        // enviar datos a una clase para Guardar en DB
        echo "[$serial ]";
        /* Cerrarlo */
        fclose($client);        
    }
}
fclose($server);