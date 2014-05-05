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
        $serial = '';
        $serial .= fread($client, 1500);        
        // Send data to DB
        echo "[$serial]";
        
        if (!empty($serial)) {
            encapsulado($serial);
        }
        
        // close
        fclose($client);        
    }
}
fclose($server);



// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------


/**
 * Funcion Encapsula class
 */
function encapsulado($serial)
{

// libray
require_once 'Service.php';
require_once '../../vendor/helper/helper.php';

// ejecution
$server = Service::getInstance();
//$serial = "0105140428";
$array = $server->formatData($serial);
//var_dump($server->testConnection());
$flag = $server->saveInDB($array);

// log
if ($flag) {
    write_log($serial);
} else {
    write_log("error : " . $serial);
}
    
}