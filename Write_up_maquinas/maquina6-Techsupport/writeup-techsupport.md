Lo primero que haremos será lanzar un nmap y enumerar los puertos abiertos que tengamos:

![Write_up_maquinas/maquina6-Techsupport/img/img01.png](https://github.com/alvarobueno21/Hacking_Etico/blob/567aae50d81257b31e407624696e296a395174bd/Write_up_maquinas/maquina6-Techsupport/img/img01.png)

Ahora pasaaremos a hacer fuzzing con el comando gobuster dir -u http://10.10.53.148/ -w /usr/share/wordlists/dirb/big.txt y nos encontramos un wordpress y una pagina de test que son interesantes.

Hemos intentado entrar con anonymous por ssh pero no hemos podido, si intentamos entrar con el smbclient vemos que podemos acceder y hay un archivo que podemos leer y que tiene credenciales interesantes:

![Write_up_maquinas/maquina6-Techsupport/img/img02.png](https://github.com/alvarobueno21/Hacking_Etico/blob/45bfe78851242626b2b15b5a60b69a3f217389f1/Write_up_maquinas/maquina6-Techsupport/img/img02.png)


Podemos hacer un hash-identifier y el hash para poder identificar el hash, si no en la pagina de cyberchef en autobake nos sladrá una varita magica si le hacemos click nos dirá automaticamente la contraseña:

![Write_up_maquinas/maquina6-Techsupport/img/img03.png](https://github.com/alvarobueno21/Hacking_Etico/blob/6b7c188aca943ae59ebd838b827434459b9ae4ce/Write_up_maquinas/maquina6-Techsupport/img/img03.png)

Si ahora nos vamos a 10.10.53.148/subrion/panel podremos ir al panel de administracion y poner las credenciales que ya tenemos:

A continuación ejecutaremos el siguiente comando para ver los exploits y sacaremos el .py para poder ejecutarlo en el panel de uploads:

![Write_up_maquinas/maquina6-Techsupport/img/img04.png](https://github.com/alvarobueno21/Hacking_Etico/blob/996b7f24fda2276f9cb444bbd510dfe80f879c0d/Write_up_maquinas/maquina6-Techsupport/img/img04.png)

Ahora cogeremos una reverse sehll de php cambiaremos la ip ( que es la ip que tenemos del tunel ) y el puerto y lo subiremos a uploads, luego pondremos en la cmd   nc -lvnp 1234 y ya estamos dentro:

![Write_up_maquinas/maquina6-Techsupport/img/img05.png](https://github.com/alvarobueno21/Hacking_Etico/blob/ee5bb976dc9ca9cd6964a0a72d2a42524e63a321/Write_up_maquinas/maquina6-Techsupport/img/img05.png)

Una vez dentro tendremos que upgradear la shell con el comando pyhton3 -c 'import pty;pty.spawn("/bin/bash")' y ya tendremos permisos de administrador.

Ahora nos vamos a la ruta /var/www/html/wordpress/wp-config.php y ahi podremos ver el usuario y la contraseña de la base de datos:

![Write_up_maquinas/maquina6-Techsupport/img/img06.png](https://github.com/alvarobueno21/Hacking_Etico/blob/9627c46bc66d6df97ac03aef48a092da43c21ed4/Write_up_maquinas/maquina6-Techsupport/img/img06.png)

Si nos vamos a /home vemos que el unico usuario que hay es scamsite y ya tenemos la contraseña por lo tanto intentamos entrar y vemos que accedemos

![Write_up_maquinas/maquina6-Techsupport/img/img07.png](https://github.com/alvarobueno21/Hacking_Etico/blob/dfca50681f085beeeda0e352efcfe0a7a6be408f/Write_up_maquinas/maquina6-Techsupport/img/img07.png)

Ahora ejecutaremos sudo -l y nos da una pista de que podremos ejecutar /usr/bin/iconv, iremos a GTFObins y lo buscaremos, y usaremos los comandos de SUID para ejecutarlos e intentar sacar la flag:

Ahora tendremos que poner el siguiente comando:  sFILE=file_to_read, LFILE=/root/root.txt y luego usaremos sudo iconv -f 8859_1 -t 8859_1 "$FILE" o en lugar de $FILE podremos poner /root/root.txt

Podremos suponer que el root.txt esta en /root/root.txt y efectivamente y así encontramos la flag:

![Write_up_maquinas/maquina6-Techsupport/img/img08.png](https://github.com/alvarobueno21/Hacking_Etico/blob/8e18fbf00bf910f8aed564db3a0de28a9e358da1/Write_up_maquinas/maquina6-Techsupport/img/img08.png)


