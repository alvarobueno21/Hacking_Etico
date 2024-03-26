
Lo primero que haremos será lanzar el siguiente namp y escanear los posibles puertos abiertos: sudo nmap -A -sV -sC -T4 -p- --defeat-rst-ratelimit 10.10.126.250

Nos da que tiene los siguientes puertos abiertos:


![Write_up_maquinas/maquina6-relevant/img/img01.png](https://github.com/alvarobueno21/Hacking_Etico/blob/6f3f45bcd95897ed2c8897009337c63bbe7466a1/Write_up_maquinas/maquina6-relevant/img/img01.png)

Luego lanzaremos nuestro comando de gobuster para hacer fuzzing a los directorios con el siguiente comando: gobuster dir -w /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt -u 10.10.126.250

Y descubriremos algunos directorios


![Write_up_maquinas/maquina6-relevant/img/img02.png](https://github.com/alvarobueno21/Hacking_Etico/blob/6f3f45bcd95897ed2c8897009337c63bbe7466a1/Write_up_maquinas/maquina6-relevant/img/img02.png)

Haremos un smbclient a ver si podemos acceder sin contraseña y si podemos, lo haremos con el comando: sudo smbclient -L 10.10.237.72

![Write_up_maquinas/maquina6-relevant/img/img03.png](https://github.com/alvarobueno21/Hacking_Etico/blob/6f3f45bcd95897ed2c8897009337c63bbe7466a1/Write_up_maquinas/maquina6-relevant/img/img03.png)

Ahora accederemos con el usuario nt4wrksv, a ver si podemos, lo haremos con el siguiente comando: smbclient \\\\10.10.237.72\\nt4wrksv

![Write_up_maquinas/maquina6-relevant/img/img04.png](https://github.com/alvarobueno21/Hacking_Etico/blob/6f3f45bcd95897ed2c8897009337c63bbe7466a1/Write_up_maquinas/maquina6-relevant/img/img04.png)

Y si hacemos un ls vemos un fichero interesante, hacemos un get y luego un cat para ver su contenido, parece que esta encodeado en base64, nos vamos a ciberchef y sacamos las contraseñas.




