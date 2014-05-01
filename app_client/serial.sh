#!/bin/bash

RUTA_PS=/dev/ttyS1 #Puerto Serial
CONF_VELOCIDAD="9600"
CONF_NUMERO_BITS_TRAMA="8"
CONF_OPCIONES="-parenb"
RUTA_PHP=./application/client.php

echo "######### en dev ##########"
echo "leyendo puerto : $RUTA_PS"
sleep 1

#Configurando puerto serial para lectura
stty $CONF_VELOCIDAD -F $RUTA_PS cs$CONF_NUMERO_BITS_TRAMA $CONF_OPCIONES

#Capturando data
cat $RUTA_PS | while read line; do php $RUTA_PHP "${line}" && echo ${line}; done >> serial.log &
######## php servicio.php ${line} && echo ${line} > serial.log;