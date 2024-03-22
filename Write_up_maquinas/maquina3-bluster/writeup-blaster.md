Lo primero que haremos será hacer un nmap y enumerar los puertos abiertos
IMG01



Una vez hecho esto haremos fuzzing y encontramos una ruta /retro
IMG02




Nos vamos a la pagina y encontramos que el nombre de Wade se refiere a un personaje de avatar que se llama parzival
IMG03

Ahora nos conectaremos por rdp, si no lo tenemos instalado lo instalamos con el siguiente comando:

sudo apt update && sudo apt install freerdp2-x11

Y luego para conectarnos por rdp a la maquina lo haremos con este otro comando:

xfreerdp /u:wade /p:parzival /v:192.168.1.211

Y si miramos el documento de texto del escritorio tenemos esta flag: THM{HACK_PLAYER_ONE}
