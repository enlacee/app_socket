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
$server = stream_socket_server("tcp://127.0.0.1:1337", $errno, $errorMessage);

if ($server === false) {
    throw new UnexpectedValueException("Could not bind to socket: $errorMessage");
}

for (;;) {
    $client = @stream_socket_accept($server);

    if ($client) {
        //stream_copy_to_stream($client, $client);
        
	/* Tomar un paquete (1500 es un tamaño de MTU típico) de información OOB */
	//echo "Recibido Fuera de Banda: '" . stream_socket_recvfrom($client, 1500, STREAM_OOB) . "'\n";

	/* Echar un vistazo a la información en banda normal, pero sin comsumirla. */
	//echo "Información: '" . stream_socket_recvfrom($client, 1500, STREAM_PEEK) . "'\n";

	/* Obtener el mismo paquete exactamente otra vez, pero eliminándolo del buffer esta vez. */
	//echo "Información: '" . stream_socket_recvfrom($client, 1500) . "'\n";

var_dump(stream_get_contents($client));

        fclose($client);        
    }
}