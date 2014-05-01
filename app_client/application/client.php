<?php
/**
 * Cliente
 * Enviara datos hacia el servidor (nuve).
 * Conexion por (this socket cliente) a traves de:
 * cofiguracion ideal
 * IP = 190.187.26.210
 * Puerto = 81
 */

$client = new Service($argv);
echo "_client.php : respuesta_final ";
var_dump($client);