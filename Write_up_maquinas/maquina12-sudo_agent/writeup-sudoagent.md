Lo primero que haremos será lanzar este nmap: sudo nmap -Pn 10.10.244.112

![img01](img/img01.png)

Luego si nos vamos a la pagina web de la ip veremos que es importante el tema de user-agent.

![img02](img/img02.png)

Pregunta: Como te redireccionas a una página secreta: user-agent
Cuál es el agent name?
Ahora inspeccionamos la pagina y refrescamos la página:

![img03](img/img03.png)
 
Y ahora le daremos a la segunda opción y luego a edit and resend y arriba ponemos ip/agent_C_attention.php

![img04](img/img04.png)

Respuestas Parte 2:

How many open ports: 3 (con nmap)
How you redirect yousrself to a secret page: user-agent
Y el nombre del agente es Chris
Ahora hacemos un ataque de fuerza bruta al ftp:
hydra -l chris -P /usr/share/wordlists/rockyou.txt 10.10.183.115 ftp
Y ya nos da el usuario y contraseña:
 
![img05](img/img05.png)

Ahora nos conectamos al ftp con esas credenciales y hacemos un mget * para coger todos los ficheros y llevarlos a nuestro equipo.

![img06](img/img06.png)

Ahora ejecutamos el siguiente comando para ver esta imagen y extraer algunos archivos:

![img07](img/img07.png)

Hacemos un cd al nuevo directorio: 

![img08](img/img08.png)

Y luego haremos estos comandos:
zip2john 8702.zip > hashzip.txt
cat hashzip.txt
john hashzip.txt 8702.zip

![img09](img/img09.png)

Y ahora descomprimimos el zip con la contraseña alien:

![img10](img/img10.png)

Ahora nos vamos a hacerle un cat al fichero que acabamos de extraer del zip:

![img11](img/img11.png)

Y nos vamos a ciberchef y nos da la contraseña que es Area51:
 
![img12](img/img12.png)

Ahora haremos este comando y metemos la contraseña area51:

![img13](img/img13.png)

Ahora hacemos un cat a message.txt y nos da un usuario y una contraseña:

![img14](img/img14.png)

Y entramos por ssh con estas credenciales:

![img15](img/img15.png)

Y ya tenemos la flag del usuario:

![img16](img/img16.png)

Ahora hacemos este comando:

![img17](img/img17.png)

Y abrimos un servidor en el ssh de Python para pasarnos la imagen:

![img18](img/img18.png)

Y esta es la imagen que extraemos:

![img19](img/img19.png)

Filtramos la imagen con Google Lens:
 
![img20](img/img20.png)

Si filtramos por Google y buscamos lo siguiente: 

![img21](img/img21.png)

Esta es la siguiente flag:

![img22](img/img22.png)

Hacemos un sudo -l y vemos lo siguiente:

![img23](img/img23.png)

Buscamos esto en Google:

![img24](img/img24.png)
 
El CVE es:

![img25](img/img25.png)

ESCALAR PRIVILEGIOS:
Hacemos esto: sudo -u#-1 /bin/bash

![img26](img/img26.png)

Y nos vamos a cd/root y hacemos un ls y un cat a root.txt

![img27](img/img27.png)

Y el Agent R es: DesKel 

![img28](img/img28.png)
