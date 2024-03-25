
Lo primero que haremos será lanzar el siguiente namp y escanear los posibles puertos abiertos: sudo nmap -A -sV -sC -T4 -p- --defeat-rst-ratelimit 10.10.126.250

Nos da que tiene los siguientes puertos abiertos:

IMG01

Luego lanzaremos nuestro comando de gobuster para hacer fuzzing a los directorios con el siguiente comando: gobuster dir -w /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt -u 10.10.126.250

Y descubriremos algunos directorios

IMG02

Harem
