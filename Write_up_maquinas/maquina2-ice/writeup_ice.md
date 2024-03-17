Lo primero que haremos será abrir la máquina y ver si podemos acceder a ella, en este caso si podemos, por lo tanto ejecutamos ipconfig en el cmd y veremos su ip.


Luego lo que haremos será ejecutar un nmap en kali linux con esa ip, con el comando sudo nmap -A -T4 -p- 192.168.92.133:

Aqui podemos ver el hostname y también veremos las vulnerabilidades con el comando:  sudo nmap -A -T4 -p- --script vuln 192.168.92.133

![Write_up_maquinas/maquina2-ice/img/img01.png](https://github.com/alvarobueno21/Hacking_Etico/blob/55c44640845854829ab9a7f19e3541279fffa494/Write_up_maquinas/maquina2-ice/img/img01.png)

Ahora nos vamos a esta pagina web: https://www.cvedetails.com/cve/CVE-2004-1561/  donde podremos ver el cve y el impact score que tiene la vulnerabilidad icecast.

A continuación nos iremos a metasploit y ejecutaremos el comando search CVE-2004-1561 para ver el modulo que podemos usar para esta vulnerabilidad y le damos a use 0.

Ahora le daremos a options y vemos que rhosts esta vacio, ponemos la ip de la maquina con set rhosts 192.168.92.133 y listo le damos a run y ya tenemos una meterpreter.

Para poder ver la información del usuario ejecutaremos el comando getuid y para ver que sistema operativo usa y su arquitectura usaremos el comando sysinfo

![Write_up_maquinas/maquina2-ice/img/img02.png](https://github.com/alvarobueno21/Hacking_Etico/blob/06623d5bcb7b118241f6e57c49ef59f155f658cc/Write_up_maquinas/maquina2-ice/img/img02.png)

Para escalar privilegios usaremos el comando que vemos aqui arriba donde nos saldran un monton de exploits y cogeremos el primero, exploit/windows/local/bypassuac_eventvwr.

Ahora le damos a use y configuramos la sessionde meterpreter que teniamos abierta anteriormente y le damos a run para poder escalar privilegios.

Y ahora ejecutamos getprivs y veremos que el privilegio que usaremos para escalar es SeTakeOwnershipPrivilege.

Si hacemos un ps y vemos los procesos, npos fijamos en uno que se llama spoolsv.exe que tiene el numero 1104 de identificador, si hacemos migrate 1104, migraremos sus privilegios, si hacemos getuid somos NT AUTHORITY\SYSTEM.

![Write_up_maquinas/maquina2-ice/img/img03.png](https://github.com/alvarobueno21/Hacking_Etico/blob/40bfd5bc7b3f0c345fa0db0b3e1944101be1e3c4/Write_up_maquinas/maquina2-ice/img/img03.png)

A continuación cargaremos kiwi con load kiwi y con creds_all podemos sacar todas las credenciales.

Otra opción es hacer el comando hashdump que nos dará los hashes de las contraseñas de los usuarios de las máquinas es usar hashdump, si queremos ver en directo la maquina, podemos ejecutar el comando screenshare. 

![Write_up_maquinas/maquina2-ice/img/img04.png](https://github.com/alvarobueno21/Hacking_Etico/blob/f2857c22cc570fb30bf06fbae17617e5c1fe3533/Write_up_maquinas/maquina2-ice/img/img04.png)

Si queremos escuchar una grabacion del micro de la maquina lo haremos con record_mic y si queremos modificar archivos timestamp lo haremos con timestomp.

Si queremos intentar mantener la persistencia lo podemos hacer con ataques de tickets dorados, el comando es golden_ticket_create.

