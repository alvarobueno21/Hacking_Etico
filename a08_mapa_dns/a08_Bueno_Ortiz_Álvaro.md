# Índice
1. [Introducción](#introducción)
   - [Justificación](#justificación)
2. [Información Whois](#información-whois)
   - [nslookup](#requisitos-del-sistema)
   - [AS (Sistema Autónomo)](#as-sistema-autónomo)
   - [ISP (Proveedor de Servicios de Internet)](#isp-(proveedor-de-servicios-de-internet))
   - [Mapa DNS](#mapa-dns)
3. [Servidores DNS](#servidores-dns)
4. [Servidores de correo](#servidores-de-correo)
5. [Subdominios](#subdominios)
6. [Información adicional](#información-adicional)
   - [Presencia en Redes Sociales](#presencia-en-redes-sociales)
   - [Información de los empleados](#información-de-los-empleados)


# Introducción
Este documento describe la manera en la que se explora la infraestructura de la compañía "El Pozo" a través de métodos y herramientas de OSINT. A partir del momento en que identifican la dirección de IP a través de nslookup, hasta el momento en que podemos ver la estructura de DNS a través de dnsdumpster, cada paso se explica detalladamente con la explicación de los procesos y las herramientas utilizadas en esta investigación.

## Justificación
**¿Por qué es relevante esta información para tu auditoría?** <br>
Esta información es esencial para la auditoría debido a que nos permite evaluar y mejorar la seguridad de la infraestructura digital de El Pozo. Analizar la configuración DNS, el Sistema Autónomo y el Proveedor de Servicios de Internet nos ayuda a identificar posibles vulnerabilidades, riesgos e identificar las herramientas y programas que usa la empresa dentro de su infraestructura, así como el nivel de seguridad que tienen e intentar mejorarlo. Además, examinar los servidores DNS, configuraciones de correo electrónico y subdominios es primordial para gestionar las comunicaciones de manera segura y proteger la privacidad de la empresa.

# Información Whois

## nslookup
Tendremos que hacer un nslookup para encontrar la ip de el pozo, simplemente ejecutamos en nuestra terminal de windows nslookup elpozo.com

![img/elpozo9.png](https://github.com/alvarobueno21/Hacking_Etico/blob/c533371b163135c086ee706b8feaa8bba0da3931/a08_mapa_dns/img/elpozo9.png)

## AS (Sistema Autónomo)
Con la herramienta bgp.he.net metemos la dirección IP de el pozo (anteriormente la sacamos con el nslookup) y podemos encontrar el AS de elpozo.com, que es el siguiente:

![img/elpozo8.png](https://github.com/alvarobueno21/Hacking_Etico/blob/c533371b163135c086ee706b8feaa8bba0da3931/a08_mapa_dns/img/elpozo8.png)

## ISP (Proveedor de Servicios de Internet)

Con la herramienta hemos encontrado ipinfo.io he encontrado varios datos sobre el proveedor de Servicios de Internet que es telefónica, para ejecutar esta herramienta previamente tuve que hacer un nslookup a elpozo y encontrar su dirección IP. Una vez encontrada su dirección IP que es la 195.57.134.66, ejecutamos la búsqueda en ipinfo.io y nos dará los siguientes datos:

![img/elpozo6.png](https://github.com/alvarobueno21/Hacking_Etico/blob/c15e7abaaf3390f333b3a196b7e540540dc9215c/a08_mapa_dns/img/elpozo6.png)

## Mapa DNS

Para sacar el mapa de DNS nos iremos a la herramienta dnsdumpster y exportaremos el mapa como png y aquí lo tenemos:

![img/elpozo11.png](https://github.com/alvarobueno21/Hacking_Etico/blob/c82df8b8f7d3981e9b624f4cafb5c9ec4c93080a/a08_mapa_dns/img/elpozo11.png)

# Servidores DNS
Con el programa dnsdumpster podemos ver los siguientes servidores DNS:
![img/elpozo7.png](https://github.com/alvarobueno21/Hacking_Etico/blob/c533371b163135c086ee706b8feaa8bba0da3931/a08_mapa_dns/img/elpozo7.png)

También encontraremos con la herramienta dnsdumpster los registros TXT (Text Records) en DNS que son un tipo de registro que permite a los administradores de dominios insertar texto arbitrario en el DNS de un dominio, y tiene varios fines como verificación de propiedad de un dominio hasta configuraciones específicas de seguridad y políticas de correo electrónico. 

Estos son algunos de ellos:
   - elpozo.com TXT MS=ms72096551
   - elpozo.com TXT facebook-domain-verification=rtdbbxoqjj8g8do97obfcvjzwz427d
   - elpozo.com TXT v=spf1 include:7185630.spf10.hubspotemail.net include:spf.ipzmarketing.com include:spf.protection.outlook.com   
   - include:mailbox.edicomnet.com include:servers.mcsv.net mx ip4:195.57.134.40/29 exists:%{i}.spf.hc1419-85.eu.iphmx.com ~all
   - elpozo.com TXT hFhrcB0MnxT3OQTuOcQvr74wfZOzuJJ8lsgsbSbfIN0+dBlQNGDmlWlZo2LTkrROTEF79hBCjd3pZLsOjLhYvg==
   - elpozo.com TXT google-site-verification=f20wufKzQEXEw1uSfE_B6DBfOkoh0OxgnjgBoMekn0U

# Servidores de Correo

Con la máquina virtual de kali, podemos ver con la herramienta dig los registros MX que tiene el pozo, en este caso solo encontramos uno, que es el siguiente:

![img/elpozo1.01.png](https://github.com/alvarobueno21/Hacking_Etico/blob/48b8250a3506adf25f60ddd2177e91799420aed9/a08_mapa_dns/img/elpozo1.01.png)

# Subdominios

Con la ayuda de la herramienta de dnsdumpster podemos sacar información de todos los subdominios del pozo, las tecnologías que usan (nginx,apache...), las versiones por ejemplo de ssh que usan, etc.

![img/elpozo4.png](https://github.com/alvarobueno21/Hacking_Etico/blob/464e4ef38f5625f68b3fbb64392afc3b95ea65cf/a08_mapa_dns/img/elpozo4.png)

# Información Adicional

Con la herramienta criminalip que está disponible si la buscamos en internet podemos buscar bastantes datos interesantes y hacer un escaneo completo al pozo. Podemos sacar información importante como es el JARM hash, la fecha en la que se creo el dominio, y que compañia registró dicho dominio.

![img/elpozo2.png](https://github.com/alvarobueno21/Hacking_Etico/blob/48b8250a3506adf25f60ddd2177e91799420aed9/a08_mapa_dns/img/elpozo2.png)

También podemos sacar información sobre las tecnologías que usa la página web del pozo y más información sobre el certificado TLS que tiene, que encriptación usa, las cookies que tiene...

![img/elpozo3.png](https://github.com/alvarobueno21/Hacking_Etico/blob/464e4ef38f5625f68b3fbb64392afc3b95ea65cf/a08_mapa_dns/img/elpozo3.png)

## Presencia en redes sociales

Para buscar las redes sociales de el pozo, nos dirigimos a su página oficial y tienen enlaces directos a sus redes sociales:
- [Facebook](https://www.facebook.com/ElPozoAlimentacion/) 
- [Instagram](https://www.instagram.com/elpozoalimentacion/)
- [LinkedIn](https://www.linkedin.com/company/elpozo-alimentacion-s.a./?originalSubdomain=es)
- [Youtube](https://www.youtube.com/user/spotespeciales)
- [Twitter](https://twitter.com/ElPozoAlimenta)


## Información de los empleados

### Datos de contacto y correos electrónicos de administración.

Con la máquina virtual de kali también podemos ejecutar el programa Spiderfoot para poder hacer una búsqueda de OSINT de correos sobre la empresa del pozo, en la siguiente imagen podemos ver algunos de ellos:

![img/elpozo5.png](https://github.com/alvarobueno21/Hacking_Etico/blob/464e4ef38f5625f68b3fbb64392afc3b95ea65cf/a08_mapa_dns/img/elpozo5.png)

