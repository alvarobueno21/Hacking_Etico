Lo primero que haremos será hacer un escaneo de los puertos con nmap -Pn -A -p- -T5 10.10.213.123 (ip_de_la_maquina)

![Write_up_maquinas/maquina13-rootme/img/img01.png](https://github.com/alvarobueno21/Hacking_Etico/blob/62b6aaa05106d555c351ee2e48f0b5b868bf7469/Write_up_maquinas/maquina13-rootme/img/img01.png)

Y aquí podremos sacar los puertos abiertos, sus servicios, la versión de apache ...

Ahora usaremos el gobuster para poder encontrar algunas direcciones ocultas como puede ser /panel/

![Write_up_maquinas/maquina13-rootme/img/img02.png](https://github.com/alvarobueno21/Hacking_Etico/blob/75242125996c15af85eca5339f0948a3e7c6f6ef/Write_up_maquinas/maquina13-rootme/img/img02.png)

