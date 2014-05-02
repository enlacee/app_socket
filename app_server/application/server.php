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
// $server = stream_socket_server("tcp://127.0.1.1:81", $errno, $errorMessage);
$server = stream_socket_server("tcp://0.0.0.0:82", $errno, $errorMessage);

if ($server === false) {
    throw new UnexpectedValueException("Could not bind to socket: $errorMessage");
}

for (;;) {
    $client = @stream_socket_accept($server);

    if ($client) {		
        $string = "";
        
        $string .= fread($client, 1500);
        
        
        // Tomar un paquete (1500 es un tamaño de MTU típico) de información OOB 
        //$string .= stream_socket_recvfrom($client, 1500, STREAM_PEEK);
        //$string .= stream_socket_recvfrom($client, 1500, STREAM_OOB);
        //echo stream_socket_recvfrom($client, 1500);

        // enviar datos a una clase para Guardar en DB
        echo "[$string]";

        /* Cerrarlo */
        fclose($client);        
    }
}
fclose($server);