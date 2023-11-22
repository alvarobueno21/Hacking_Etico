
Descripción de la Actividad
En una primera etapa de auditoría, se os pide recopilar toda la información sobre la infraestructura de la empresa “El POZO” disponible en fuentes abierta. Utiliza herramientas y técnicas de OSINT (Open Source Intelligence) para recabar datos esenciales que serán cruciales en las etapas posteriores de la auditoría.

Tareas a Realizar
Información Whois. Recopila datos Whois de la empresa, incluyendo direcciones IP, 
----- AS (Sistema Autónomo) ----- 
---- ISP (Proveedor de Servicios de Internet) ------
datos de contacto y correos electrónicos de administración.

# Introducción

## Servidores DNS. Identifica los servidores DNS utilizados por "El POZO".

Para ver los servidores DNS de elpozo, utilizaremos la herramienta DNS lookup, que podremos usar dentro de una máquina de linux o también en Internet que hay herramientas que nos permiten hacer lo mismo:

Aquí podemos ver los dos principales con sus IPS:
 elpozo.com NS scen17.elpozo.com 195.57.134.76
   elpozo.com NS scen15.elpozo.com 195.57.134.74
   
Se ha consultado el servidor dns raíz c.gtld-servers.net con IP 192.26.92.30
Los registros NS del dominio son:
   elpozo.com NS scen15.elpozo.com 195.57.134.74
   elpozo.com NS scen17.elpozo.com 195.57.134.76
 
Los registros TXT del dominio son:
   elpozo.com TXT MS=ms72096551
   elpozo.com TXT facebook-domain-verification=rtdbbxoqjj8g8do97obfcvjzwz427d
   elpozo.com TXT v=spf1 include:7185630.spf10.hubspotemail.net include:spf.ipzmarketing.com include:spf.protection.outlook.com   
   include:mailbox.edicomnet.com include:servers.mcsv.net mx ip4:195.57.134.40/29 exists:%{i}.spf.hc1419-85.eu.iphmx.com ~all
   elpozo.com TXT hFhrcB0MnxT3OQTuOcQvr74wfZOzuJJ8lsgsbSbfIN0+dBlQNGDmlWlZo2LTkrROTEF79hBCjd3pZLsOjLhYvg==
   elpozo.com TXT google-site-verification=f20wufKzQEXEw1uSfE_B6DBfOkoh0OxgnjgBoMekn0U

## Servidores de Correo. Determina los servidores de correo electrónico asociados con "El POZO".

Con la máquina virtual de kali, podemos ver con la herramienta dig los registros MX que tiene el pozo, en este caso solo encontramos uno, que es el siguiente:

![img/elpozo1.01.png](https://github.com/alvarobueno21/Hacking_Etico/blob/48b8250a3506adf25f60ddd2177e91799420aed9/a08_mapa_dns/img/elpozo1.01.png)

## Datos de contacto y correos electrónicos de administración.

Con la máquina virtual de kali también podemos ejecutar el programa Spiderfoot para poder hacer una búsqueda de OSINT de correos sobre la empresa del pozo, en la siguiente imagen podemos ver algunos de ellos:

![img/elpozo5.png](https://github.com/alvarobueno21/Hacking_Etico/blob/464e4ef38f5625f68b3fbb64392afc3b95ea65cf/a08_mapa_dns/img/elpozo5.png)

## Subdominios. Encuentra los subdominios relacionados con el dominio principal de la empresa.

Con la ayuda de la herramienta de dnsdumpster podemos sacar información de todos los subdominios del pozo, las tecnologías que usan (nginx,apache...), las versiones por ejemplo de ssh que usan, etc.

![img/elpozo4.png](https://github.com/alvarobueno21/Hacking_Etico/blob/464e4ef38f5625f68b3fbb64392afc3b95ea65cf/a08_mapa_dns/img/elpozo4.png)

# Información Adicional:

Con la herramienta criminalip que está disponible si la buscamos en internet podemos buscar bastantes datos interesantes y hacer un escaneo completo al pozo. Podemos sacar información importante como es el JARM hash, la fecha en la que se creo el dominio, y que compañia registró dicho dominio.

![img/elpozo2.png](https://github.com/alvarobueno21/Hacking_Etico/blob/48b8250a3506adf25f60ddd2177e91799420aed9/a08_mapa_dns/img/elpozo2.png)

También podemos sacar información sobre las tecnologías que usa la página web del pozo y más información sobre el certificado TLS que tiene, que encriptación usa, las cookies que tiene...

![img/elpozo3.png](https://github.com/alvarobueno21/Hacking_Etico/blob/464e4ef38f5625f68b3fbb64392afc3b95ea65cf/a08_mapa_dns/img/elpozo3.png)

## Presencia en redes sociales

Para buscar las redes sociales de el pozo, nos dirigimos a su página oficial y tienen enlaces directos a sus redes sociales:
- [Facebook](https://www.facebook.com/ElPozoAlimentacion/) 
- [Instagram](https://www.instagram.com/elpozoalimentacion/)
- [LinkedIn](https://www.linkedin.com/company/elpozo-alimentacion-s.a./?originalSubdomain=es)
- [Youtube]()
- [Twitter]()




## Información de los empleados

La podemos sacar con spiderfoot



Recopila cualquier otra información que consideres relevante (ej. presencia en redes sociales, información de empleados, etc.).
Justifica claramente por qué esta información es relevante para tu auditoría.:
Redacta un informe detallado en el que documentes cada paso de tu proceso de recopilación de información. Este informe debe incluir:

Los métodos y herramientas utilizadas.
Los datos recopilados.
Análisis y justificación de la relevancia de la información encontrada.
