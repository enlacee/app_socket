<?php

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