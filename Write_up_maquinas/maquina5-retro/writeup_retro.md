Lo primero que haremos será hacer un escaneo de red y ver que ip tiene nuestra maquina, ya que la estamos ejecutando en local, para ello usaremos el comando:
sudo netdiscover

Luego haremos un nmap para ver los puertos abiertos con el siguiente comando: 

sudo nmap -Pn -A -p- -T5 192.168.1.172

Y luego fuzzing con el siguiente comando: gobuster dir -u http://192.168.1.172/ -w /usr/share/wordlists/dirb/big.txt y veremos que hay un directorio /retro si entramos descubrimos la pagina oculta de esta maquina.

Una vez dentro de la pagina podemos ver que hay en los comentarios una contraseña y tenemos el usuario que subió el post, ahora nos vamos a /retro/wp-admin e intentamos meternos en el panel de administracion con estas credenciales:

IMG01

Si nos vamos a la propia maquina y accedemos con las mismas credenciales, podemos ver que hay un user.txt en el escritorio y si entramos dentro esta nuestra primera flag.




