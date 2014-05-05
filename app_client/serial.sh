#!/bin/bash

RUTA_PS=/dev/ttyS0 #Puerto Serial
CONF_VELOCIDAD="9600"
CONF_NUMERO_BITS_TRAMA="8"
CONF_OPCIONES="-parenb"
RUTA_PHP=application/client.php

clear
echo "##################################"
echo "######### START PROCESS ##########"
echo "Read Port : $RUTA_PS"
sleep 2

#Configurando puerto serial para lectura
stty $CONF_VELOCIDAD -F $RUTA_PS cs$CONF_NUMERO_BITS_TRAMA $CONF_OPCIONES

#Capturando data
cat $RUTA_PS | while read line; do php $RUTA_PHP "${line}"; done
######## php servicio.php ${line} && echo ${line} > serial.log;