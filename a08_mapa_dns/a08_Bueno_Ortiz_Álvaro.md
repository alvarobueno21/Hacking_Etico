# Indice

# Introducción
HACERRRRRRRRR

## nslookup
Tendremos que hacer un nslookup para encontrar la ip de el pozo, simplemente ejecutamos en nuestra terminal de windows nslookup elpozo.com

![img/elpozo9.png](https://github.com/alvarobueno21/Hacking_Etico/blob/c533371b163135c086ee706b8feaa8bba0da3931/a08_mapa_dns/img/elpozo9.png)

## AS (Sistema Autónomo)
Con la herramienta bgp.he.net metemos la dirección IP de el pozo (anteriormente la sacamos con el nslookup) y podemos encontrar el AS de elpozo.com, que es el siguiente:

![img/elpozo8.png](https://github.com/alvarobueno21/Hacking_Etico/blob/c533371b163135c086ee706b8feaa8bba0da3931/a08_mapa_dns/img/elpozo8.png)

## ISP (Proveedor de Servicios de Internet)

Con la herramienta hemos encontrado ipinfo.io he encontrado varios datos sobre el proveedor de Servicios de Internet que es telefónica, para ejecutar esta herramienta previamente tuve que hacer un nslookup a elpozo y encontrar su dirección IP. Una vez encontrada su dirección IP que es la 195.57.134.66, ejecutamos la búsqueda en ipinfo.io y nos dará los siguientes datos:

![img/elpozo6.png](https://github.com/alvarobueno21/Hacking_Etico/blob/c15e7abaaf3390f333b3a196b7e540540dc9215c/a08_mapa_dns/img/elpozo6.png)


## Servidores DNS. Identifica los servidores DNS utilizados por "El POZO".
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

## Servidores de Correo

Con la máquina virtual de kali, podemos ver con la herramienta dig los registros MX que tiene el pozo, en este caso solo encontramos uno, que es el siguiente:

![img/elpozo1.01.png](https://github.com/alvarobueno21/Hacking_Etico/blob/48b8250a3506adf25f60ddd2177e91799420aed9/a08_mapa_dns/img/elpozo1.01.png)

## Subdominios

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





Justifica claramente por qué esta información es relevante para tu auditoría.:
Análisis y justificación de la relevancia de la información encontrada.
