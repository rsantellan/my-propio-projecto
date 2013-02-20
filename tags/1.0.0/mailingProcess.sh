#!/bin/bash
date
#Voy a la ruta donde esta el proyecto
cd /home/rodrigo/proyectos/symfony-proyectos/rentAndChill/trunk
pwd
date
#Corro el comando
php symfony project:send-emails --application=backend --message-limit=10 --time-limit=20
date
