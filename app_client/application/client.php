<?php
/**
 * Cliente
 * Enviara datos hacia el servidor (nuve).
 * Conexion por (this socket cliente) a traves de:
 * cofiguracion ideal
 * IP = 190.187.26.210
 * Puerto = 81
 */

// libray
require_once 'Service.php';
//require_once './../../vendor/helper/helper.php';
//write_log(print_r($argv,true));
$data = $argv[1];

// ejecution
echo "\nSending : [". $data ."] ". date("Y-m-d H:i:s.u");
$client = new Service($data);
$flag = $client->sendDataBySocket();

// log
if ($flag) {
    echo "\nSuccess : [". $data ."] ". date("Y-m-d H:i:s.u");
    write_log($data);
} else {
    write_log("error send : " . $data);
}

echo "\n";


//-----------------------------------------------------------
//-----------------------------------------------------------
//-----------------------------------------------------------

/**
 * write in file
 * @param string $string register
 */
function write_log($string, $pathFile = "/realtime.log")
{
    $file = fopen(realpath( '.' ).$pathFile, "a+");
    fwrite($file, "[".date("Y-m-d H:i:s.u") ."] ". $string . "\n");
    fclose($file);
}