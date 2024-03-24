Lo primero que haremos será hacer un escaneo de red y ver que ip tiene nuestra maquina, ya que la estamos ejecutando en local, para ello usaremos el comando:
sudo netdiscover

Luego haremos un nmap para ver los puertos abiertos con el siguiente comando: 

sudo nmap -Pn -A -p- -T5 192.168.1.172

Y luego fuzzing con el siguiente comando: gobuster dir -u http://192.168.1.172/ -w /usr/share/wordlists/dirb/big.txt y veremos que hay un directorio /retro si entramos descubrimos la pagina oculta de esta maquina.

Una vez dentro de la pagina podemos ver que hay en los comentarios una contraseña y tenemos el usuario que subió el post, ahora nos vamos a /retro/wp-admin e intentamos meternos en el panel de administracion con estas credenciales:

![Write_up_maquinas/maquina5-retro/img/img01.png](https://github.com/alvarobueno21/Hacking_Etico/blob/c03c92a983694c22175a508cafed38af3cc3911c/Write_up_maquinas/maquina5-retro/img/Img01.png)

Si nos vamos a la propia maquina y accedemos con las mismas credenciales, podemos ver que hay un user.txt en el escritorio y si entramos dentro esta nuestra primera flag.


Para sacar la segunda flag, nos iremos a google chrome y veremos en los marcadores un CVE, si lo buscamos en internet nos dicen los pasos para acceder, tenemos que ejecutar un ejecutable que hay en el equipo y nos meteremos en mas información, luego en el enlace del certificado y guardamos esa pagina en la ruta C:\Windows\System32 y luego en la barra de arriba pondremos C:\Windows\System32\cmd.exe y ya somos administradores, si hacemos un dir podemos ver que esta un documento root.txt y ya podremos acceder a el sin problemas y ver su contenido que es la flag.





