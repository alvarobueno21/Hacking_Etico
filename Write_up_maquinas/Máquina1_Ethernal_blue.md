Lo primero que haremos será hacer un escaneo con nmap a la maquina, y así veremos los puertos que están abiertos, para ello ejecutaremos el siguiente comando de nmap:


![Write_up_maquinas/img/img01.png](https://github.com/alvarobueno21/Hacking_Etico/blob/f259767006d1c404d3a2a7c39c825712c8525d33/Write_up_maquinas/img/img01.png)


Luego miraremos cuantos puertos están abiertos por debajo de los 1000, en este caso si los contamos son 3 puertos.

Si ejecutamos el siguiente nmap:
sudo nmap -sV -sC --script vuln 10.10.81.80
Podremos ver las vulnerabilidades que hay, en este caso sale que es la ms17-010.
