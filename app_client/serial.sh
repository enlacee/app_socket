#!/bin/bash

RUTA_PS=/dev/ttyS1 #Puerto Serial

CONF_VELOCIDAD="9600"
CONF_NUMERO_BITS_TRAMA="8"
CONF_OPCIONES="-parenb"

#Configurando puerto serial para lectura
stty $CONF_VELOCIDAD -F $RUTA_PS cs$CONF_NUMERO_BITS_TRAMA $CONF_OPCIONES

#Capturando data
cat $RUTA_PS | while read line; do php serial.php "${line}" && echo ${line}; done >> serial.log &


#FUNCIONA lunes 28 : 11:53 2014
#stty 9600 -F /dev/ttyS1 cs8 -parenb