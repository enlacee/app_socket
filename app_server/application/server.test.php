<?php

// libray
require_once 'Service.php';
require_once '../../vendor/helper/helper.php';

// ejecution
$server = Service::getInstance();
$serial = "0105140428";
$array = $server->formatData($serial);
var_dump($server->testConnection());
$flag = $server->saveInDB($array);

// log
if ($flag) {
    write_log($serial);
} else {
    write_log("error : " . $serial);
}