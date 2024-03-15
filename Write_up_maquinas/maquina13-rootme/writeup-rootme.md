Lo primero de todo será conectarnos a la vpn con el comando openvpn fichero.openvpn, una vez dentro lo primero que haremos será hacer un escaneo de los puertos con nmap -Pn -A -p- -T5 10.10.213.123 (ip_de_la_maquina)

![Write_up_maquinas/maquina13-rootme/img/img01.png](https://github.com/alvarobueno21/Hacking_Etico/blob/62b6aaa05106d555c351ee2e48f0b5b868bf7469/Write_up_maquinas/maquina13-rootme/img/img01.png)

Y aquí podremos sacar los puertos abiertos, sus servicios, la versión de apache ...

Ahora usaremos el gobuster para poder encontrar algunas direcciones ocultas como puede ser /panel/

![Write_up_maquinas/maquina13-rootme/img/img02.png](https://github.com/alvarobueno21/Hacking_Etico/blob/75242125996c15af85eca5339f0948a3e7c6f6ef/Write_up_maquinas/maquina13-rootme/img/img02.png)

A continuación tendremos que crear una reverse shell de php y editarla poniendo nuestra ip y un puerto de escucha, si la subimos al servidor no nos dejará, para que funcione tendremos que irnos a 
ip/uploads y ahí subir la reverseshell con la extension .phtml y así nos dejará ejecutar la reverse shell:

![Write_up_maquinas/maquina13-rootme/img/img03.png](https://github.com/alvarobueno21/Hacking_Etico/blob/24231504e1287312dc724ef1bd09bda1cb27ac08/Write_up_maquinas/maquina13-rootme/img/img03.png)


Una vez tengamos configurada la reverse shell bien y nos vayamos a uploads podremos meter la reverse shell y poner el comando nc -lvnp 1234 para poder escuchar en el puerto de la reverse shell y entrar sin problemas:

