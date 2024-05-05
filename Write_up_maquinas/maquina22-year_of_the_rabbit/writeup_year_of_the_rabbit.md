Empezaremos la máquina haciendo este nmap: sudo nmap -sC -sV 10.10.245.81 -oN nmap

![img](img/img01.png)
 
Haremos haremos fuzzing con este comando:
wfuzz -c -L --sc=200,301 -w /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt http://10.10.245.81/FUZZ 
Y encontramos un directorio interesesante que se llama assets:

![img](img/img02.png)
 
Y entramos en style.css y vemos cosas pero nada interesante.

Ahora tenemos que deshabilitar el javascript, para ello ponemos esto en Firefox:

![img](img/img03.png)
 
Y luego doble click en javascript enable y lo ponemos en falso.

![img](img/img04.png)
 
Ahora nos vamos a esta ruta: 10.10.245.81/WExYY2Cv-qU 
Y nos sale esto: 

![img](img/img05.png)

 

Nos descargamos la imagen y le hacemos un strings:

![img](img/img06.png)
 
Y sacamos el usuario del ftp:

![img](img/img07.png)
 
Y ahora nos copiamos todo el texto que nos da a un fichero (wordlist.txt)

![img](img/img08.png)
 
Y ahora haremos fuerza bruta para adivinar la contraseña del ftp:
hydra -l ftpuser -P wordlist 10.10.245.81 ftp (con este comando)

![img](img/img09.png)
 
y ya tenemos la contraseña: 
[21][ftp] host: 10.10.245.81   login: ftpuser   password: 5iez1wGXKfPKQ 
Ahora entramos por ftp con el usuario y contraseña:

![img](img/img10.png)

 
Ahora hacemos un ls y un get Eli's_Creds.txt.

![img](img/img11.png)
 
Nos vamos a brainfuck decoder y sacamos esto:

![img](img/img12.png)
 
User: eli
Password: DSpDiM1wAEwid
Y entramos con ssh con esas credenciales:

![img](img/img13.png)
 
Ahora ponemos este comando en ssh:
find / -name 's3cr3t' 2>/dev/null
Ahora nos vamos a la ruta esa que nos ha dado el find y hacemos un ls -al para ver los ocultos:

![img](img/img14.png)
 
Ahora entramos con el usuario Gwendoline y la contraseña esa:

![img](img/img15.png)
 
Ahora hacemos un sudo -l y hacemos un cat y tenemos la primera flag: THM{****************}

![img](img/img16.png)
 
Ahora metemos este comando: sudo -u#-1 /usr/bin/vi /home/gwendoline/user.txt
Y ejecutamos eso:

![img](img/img17.png)
 
Y ahora haremos esto:

![img](img/img18.png)
 
Y ya tenemos la flag:
THM{*************} 
