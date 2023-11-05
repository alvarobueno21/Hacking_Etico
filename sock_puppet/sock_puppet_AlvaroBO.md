# SOCK PUPPET

# Indice
1. [Introducción](#introducción)
   - [¿Qué es un Sock Puppet?](#qué-es-un-sock-puppet)
   - Usos habituales

2. [Proceso de creación del Sock Puppet](#proceso-de-creación-del-sock-puppet)
   - [Preparación de la máquina virtual](#preparación-de-la-máquina-virtual)
   - [Instalación y configuración de VPN](#instalación-y-configuración-de-vpn)
   - [Desarrollo de identidad completa](#desarrollo-de-identidad-completa)
     - Datos Completos
   - [Creación de la foto de nuestra identidad falsa](#creación-de-la-foto-de-nuestra-identidad-falsa)
   - [Creación de Correo electrónico (Proton Mail)](#creación-de-correo-electrónico-proton-mail)
   - [Redes sociales](#redes-sociales)
     - [Instagram](#instagram)
     - [Twitter](#twitter)

3. [Reflexiones sobre los desafíos encontrados](#reflexiones-sobre-los-desafíos-encontrados)
   - [Bloqueo de la cuenta de Twitter](#bloqueo-de-la-cuenta-de-twitter)
   - [Número de teléfono](#número-de-teléfono)
# Introducción

En el siguiente proyecto nos haremos pasar por una persona inexistente y la crearemos a nuestro gusto, crearemos su perfil digital, con sus redes sociales y también le daremos una imagen creada por inteligencia artificial a nuestra identidad falsa. Normalmente estos perfiles se usan para hacer ciertas investigaciones a determinados objetivos pero desgraciadamente también pueden ser utilizados como método de estafa hacia personas, muchos hackers usan esta identidad falsa para poder conseguir dinero o manipular a la gente y así engañarles haciéndose pasar por una persona real. 

## ¿Qué es?

Es la creación de cuentas falsas tanto en foros, redes sociales… desde la cual podremos investigar a otra persona o entidad sin dejar rastro. Con estas cuentas nos verificaremos en sitios web, realizaremos búsquedas en redes sociales y nos haremos pasar por una persona real, nos crearemos cuentas de correos, podremos comprar sim desechables o intentar verificarnos con números de teléfono temporales y lo más importante tener nuestro perfil digital y nuestra foto personal que no sea rastreable para ello podemos crear las imágenes con inteligencia artificial.
A veces podemos llegar a comprar incluso algún producto o enviar algún mensaje e intentar interactuar con otras personas para darle credibilidad al perfil falso.

## Usos habituales

- Creación de cuentas ficticias para realizar investigaciones OSINT (Búsqueda y recopilación de información en fuentes públicas), lo haremos así para evitar el rastreo hacia nosotros
- Observar "a distancia" las redes sociales de nuestros objetivos e incluso seguirlo con nuestra cuenta falsa si queremos acercarnos más
- Son imprescindible a la hora de la filtración en foros y comunidades o toma de contactos con objetivos

# Proceso de creación del Sock Puppet

## Preparación de la máquina virtual

Lo primero que tenemos que hacer es configurar una nueva máquina virtual, ahí será donde hagamos nuestro perfil falso, es importante que no tenga enlaces externos a nuestra máquina anfitrión o se nos relacione de alguna forma, una vez tengamos la máquina instalada y limpia continuaremos al siguiente paso.

![img/img01](https://github.com/alvarobueno21/Hacking_Etico/blob/3fb090f6c38f5591d92c47d33618224f265541e0/sock_puppet/img/img01.png)

## Instalación y configuración de VPN

En nuestro caso vamos a instalar brave que es un navegador y dentro de él nos proporcionará una vpn cuando naveguemos por navegación privada, su VPN se llama Tor y es tan sencillo como abrir una ventana privada y darle click a conectar y ya tendremos lista nuestra VPN

![img/img02](https://github.com/alvarobueno21/Hacking_Etico/blob/3fb090f6c38f5591d92c47d33618224f265541e0/sock_puppet/img/img02.png)
## Desarrollo de identidad completa

Para hacer la identidad de nuestro perfil falso recurrimos a la web de [fakenamegerator.com](http://fakenamegerator.com) y ahí nos generó una identidad falsa con varios parámetros para identificar a nuestra persona falsa:

![img/img03](https://github.com/alvarobueno21/Hacking_Etico/blob/3fb090f6c38f5591d92c47d33618224f265541e0/sock_puppet/img/img03.png)

Luego me metí en otras páginas para buscar un generador de DNI falso, un IBAN, una tarjeta de banco falsa, matrícula de coche ... y esto fueron todos los datos que pude recopilar:

## Datos Completos

**Nombre:** Alanis

**Apellidos:** Martínez Tamayo

**Sexo / Género:** Masculino

**Fecha de nacimiento:** 13/02/1982 (41 años)

**Nacionalidad:** Española

**Ciudad de nacimiento:** Sevilla, España

**Domicilio:** C. San Jose, nº39, El Garrobo, Sevilla, España

**Código postal:** 41888

**Correo Electrónico:** alanismart41@protonmail.com

**Creencias religiosas:** Ateo

**Orientación sexual:** Heterosexual

**IBAN:** ES87 3112 3028 6619 4837 8840

**Tarjeta VISA:** 4696 6113 8125 0609 **Fecha de caducidad** 12/23  **CVE** 715 

**DNI (NIF):** 85134522E

**Matricula coche:** 7562LHB

**Intereses:** Sus hobbies son la fotografía y escuchar música clásica, en su tiempo libre le gusta pasear por la montaña y coger la bici.

**Estudios académicos:** Bachillerato de Ciencias y ****Carrera de Ingeniería Informática 

## Creación de la foto de nuestra identidad falsa

Nos meteremos en Canva y tenemos varias opciones para que una inteligencia artificial nos cree varias fotografías a partir de una breve descripción de lo que queremos crear, este fue el resultado y la imagen que nos quedamos para el perfil falso:

![img/img04](https://github.com/alvarobueno21/Hacking_Etico/blob/3fb090f6c38f5591d92c47d33618224f265541e0/sock_puppet/img/img04.png)

## Creación de Correo electronico (Proton Mail):

![img/img05](https://github.com/alvarobueno21/Hacking_Etico/blob/3fb090f6c38f5591d92c47d33618224f265541e0/sock_puppet/img/img05.png)

Para verificarnos podemos usar un correo temporal ya que nos pide otro correo para verificarnos en proton, así que usamos guerrillamail.com que es una web para correos temporales que nos permite tener una bandeja de entrada y poder ver los códigos o correos que nos manden y así verificarnos.

![img/img06](https://github.com/alvarobueno21/Hacking_Etico/blob/3fb090f6c38f5591d92c47d33618224f265541e0/sock_puppet/img/img06.png)

Ahora introducimos ese código de verificación en proton y ya tenemos cuenta operativa para poder verificarnos en las redes sociales.

![img/img07](https://github.com/alvarobueno21/Hacking_Etico/blob/3fb090f6c38f5591d92c47d33618224f265541e0/sock_puppet/img/img07.png)

## Redes sociales

### Instagram

A continuación, nos creamos la cuenta de Instagram y nos verificamos con el correo de proton y accedemos sin problemas, subimos algunas fotos y escribimos algo en el perfil.

![img/img08](https://github.com/alvarobueno21/Hacking_Etico/blob/3fb090f6c38f5591d92c47d33618224f265541e0/sock_puppet/img/img08.png)

También empezaremos a seguir a varios perfiles e intentaremos que nos sigan de vuelta, en este caso nos han comentado la foto y nos han comenzado a seguir también.

![img/img09](https://github.com/alvarobueno21/Hacking_Etico/blob/3fb090f6c38f5591d92c47d33618224f265541e0/sock_puppet/img/img09.png)

### Twitter

Nos crearemos una cuenta de Twitter con el correo de proton para poder acceder, una vez estemos dentro pondremos algunos tweets y seguiremos a varias personas para darle credibilidad al perfil.

![img/img10](https://github.com/alvarobueno21/Hacking_Etico/blob/3fb090f6c38f5591d92c47d33618224f265541e0/sock_puppet/img/img10.png)

## Reflexiones sobre los desafíos encontrados

### Bloqueo de la cuenta de Twitter:

Al paso de unos minutos nos bloquearon la cuenta porque encontraron algo sospechoso, asÍ que la solución fue autentificar de nuevo la cuenta para que me detectarán como humano y que no fuera un robot o algún bot que cree cuentas automáticamente.

![img/img11](https://github.com/alvarobueno21/Hacking_Etico/blob/3fb090f6c38f5591d92c47d33618224f265541e0/sock_puppet/img/img11.png)

Y conseguimos desbloquear la cuenta:

![img/img12](https://github.com/alvarobueno21/Hacking_Etico/blob/3fb090f6c38f5591d92c47d33618224f265541e0/sock_puppet/img/img12.png)

### Número de teléfono

No pudimos encontrar ningún teléfono desechable en ninguna página web para poder verificarnos en algunas redes sociales o sitios web, ya que muchos de ellos eran de pagos o simplemente no llegaban los SMS ni esperando más de 20 minutos.

![img/img13](https://github.com/alvarobueno21/Hacking_Etico/blob/3fb090f6c38f5591d92c47d33618224f265541e0/sock_puppet/img/img13.png)

La solución sería comprar algun número de telefono barato o SIM desechable a alguna compañía telefónica.
