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

Ahora intentaremos escalar privilegios para ello tendremos que buscar el modulo de meterpreter, establecer las opciones y ejecutarlo.
