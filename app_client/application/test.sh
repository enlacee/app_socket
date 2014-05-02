#!/bin/bash
clear
echo "=========================="
echo       CRON-PHP-TEST
echo "=========================="

line="copitan123"

php client.php ${line} && echo ${line} > serial.log;

echo "FIN: [$line] "