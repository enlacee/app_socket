<?php
/**
 * Cliente
 * Enviara datos hacia el servidor (nuve).
 * Conexion por (this socket cliente) a traves de:
 * cofiguracion ideal
 * IP = 190.187.26.210
 * Puerto = 81
 */
require_once 'Service.php';
$client = new Service($argv);
echo "inicio_client.php = param";
var_dump($argv[1]);
echo "final_client.php = param";