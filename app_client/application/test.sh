#!/bin/bash
clear
echo "=========================="
echo           CRON-PHP
echo "=========================="
echo "TU NOMBRE ES:"

line="copitan123"

php client.php ${line} && echo ${line} > serial.log;

echo "FINNNN: [$line]   "