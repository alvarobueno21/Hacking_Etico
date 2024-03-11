Lo primero que haremos será hacer un escaneo con nmap a la maquina, y así veremos los puertos que están abiertos, para ello ejecutaremos el siguiente comando de nmap:


![Write_up_maquinas/img/img01.png](https://github.com/alvarobueno21/Hacking_Etico/blob/f259767006d1c404d3a2a7c39c825712c8525d33/Write_up_maquinas/img/img01.png)


Luego miraremos cuantos puertos están abiertos por debajo de los 1000, en este caso si los contamos son 3 puertos.

Si ejecutamos el siguiente nmap:
sudo nmap -sV -sC --script vuln 10.10.81.80
Podremos ver las vulnerabilidades que hay, en este caso sale que es la ms17-010.
![Write_up_maquinas/img/img02.png](https://github.com/alvarobueno21/Hacking_Etico/blob/2ac9c2a67197ee8bc1ba5eddac8a8cff1f773bd2/Write_up_maquinas/img/img02.png)

Y el siguiente paso será lanzar sudo msfconsole para poder abrir metasploit y poder ver si podemos explotar esa vulnerabilidad.

Para buscarlo en msfconsole, tenemos que poner search ms17-010, y darle a usar para que nos use el exploit de windows de ethernalblue, una vez dentro del modulo pondremos las opciones de rhosts para establecer la ip del equipo al que queremos atacar.

![Write_up_maquinas/img/img03.png](https://github.com/alvarobueno21/Hacking_Etico/blob/1c0510a273adb03677eaae8863f75474e48de8d0/Write_up_maquinas/img/img03.png)

Acto seguido ejecutaremos el comando run para lanzar el exploit:

![Write_up_maquinas/img/img06.png](https://github.com/alvarobueno21/Hacking_Etico/blob/55fa2ef0c57044082c6d071d5ead3dc18e5941ff/Write_up_maquinas/img/img06.png)

Una vez hecho esto ya tenemos la meterpreter, para ver el modulo de meterpreter, usaremos el siguiente comando: search shell_to_meterpreter

![Write_up_maquinas/img/img07.png](https://github.com/alvarobueno21/Hacking_Etico/blob/10bc802ab7977c01d2c813e969bec5170178c5dc/Write_up_maquinas/img/img07.png)

Si hacemos un getuid podremos ver que estamos en NT AUTHORITY\SYSTEM.

Una vez dentro del meterpreter, hacemos un hashdump y veremos las contraseñas y los usuarios de la máquina:

![Write_up_maquinas/img/img08.png](https://github.com/alvarobueno21/Hacking_Etico/blob/322fea276b6371d180cf15b690c879ca8b1b3b7a/Write_up_maquinas/img/img08.png)

Para poder ver la contraseña del usuario John, el cual no es el usuario por defecto del equipo y ha sido creado por el propietario del equipo, usaremos el programa john, para poder descifrar el hash, que en este caso es de tipo NTLM Hash (NT LAN Manager Hash), así almacena Windows los hashes de las contraseñas, y aquí podremos ver su contraseña y al lado su hash, censurado por seguridad:

![Write_up_maquinas/img/img09.png](https://github.com/alvarobueno21/Hacking_Etico/blob/a47be525d90e3dc3f06a402ea01c014ef8b6e9f6/Write_up_maquinas/img/img09.png)

