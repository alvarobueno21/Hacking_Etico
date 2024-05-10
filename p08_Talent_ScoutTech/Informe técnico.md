Indice


# Parte 1 - SQLi

## Apartado 1a
a) Dad un ejemplo de combinación de usuario y contraseña que provoque un error en la consulta SQL generada por este formulario. Apartir del mensaje de error obtenido, decid cuál es la consulta SQL que se ejecuta, cuál de los campos introducidos al formulario utiliza y cuál no.


| Campos                                     |  Valores                                     | 
|---------------------------------------------|------------------------------------------------------| 
| Escribo los valores...                      |       "c"                                               | 
| Del formulario de la página                 |         web/insert_player.php                                             | 
| La consulta SQL que se ejecuta es...        |          SELECT userId, password FROM users WHERE username = ""c""                                            | 
| Campos del formulario web utilizados en la consulta SQL       |      username                                               | 
| Campos del formulario web no utilizados en la consulta SQL    |           userId, password                                           | 

img01

## Apartado 1b
b) Gracias a la SQL Injection del apartado anterior, sabemos que este formulario es vulnerable y conocemos el nombre de los campos de la tabla “users”. Para tratar de impersonar a un usuario, nos hemos descargado un diccionario que contiene algunas de las contraseñas más utilizadas (se listan a continuación):

password
123456
12345678
1234
qwerty
12345678
dragon

Para este apartado usaré un kali linux con el programa hydra donde pondré un fichero que hará de diccionario para los usuarios más utilizados y otro fichero con contraseñas donde incluiremos las contraseñas de arriba, también como parametros pondremos la ip y la dirección donde queremos hacer fuerza bruta al login y se pondrá también el mensaje de error que nos da la página si entramos con un usuario o contraseña erroneos, una vez hecho esto sacaremos el usuario que se llama luis y la contraseña que es 1234, como podemos ver aquí abajo:

img02


## Apartado 1c
c) Si vais a private/auth.php, veréis que en la función areUserAndPasswordValid”, se utiliza “SQLite3::escapeString()”, pero, aun así, el formulario es vulnerable a SQL Injections, explicad cuál es el error de programación de esta función y como lo podéis corregir.


| Campos                                     |  Valores                                     | 
|---------------------------------------------|------------------------------------------------------| 
| Explicación del ataque                     |                                                   | 
| Campo de usuario con que el ataque ha tenido éxito                 |                                                   | 
| Campo de contraseña con que el ataque ha tenido éxito        |                                                     | 


## Apartado 1d
d) Si habéis tenido éxito con el apartado b), os habéis autenticado utilizando elusuario “luis” (si no habéis tenido éxito, podéis utilizar la contraseña “1234” para realizar este apartado). Con el objetivo de mejorar la imagen de la jugadora “Candela Pacheco”, le queremos escribir un buen puñado de comentarios positivos, pero no los queremos hacer todos con la misma cuenta de usuario.

Para hacer esto, en primer lugar habéis hecho un ataque de fuerza bruta sobre eldirectorio del servidor web (por ejemplo, probando nombres de archivo) y habéis encontrado el archivo “add_comment.php~”. Estos archivos seguramente se han creado como copia de seguridad al modificar el archivo “.php” original directamente al servidor. En general, los servidores web no interpretan (ejecuten) los archivos “.php~” sino que los muestran como archivos de texto sin interpretar.

Esto os permite estudiar el código fuente de “add_comment.php” y encontrar una vulnerabilidad para publicar mensajes en nombre de otros usuarios. ¿Cuál es esta vulnerabilidad, y cómo es el ataque que utilizáis para explotarla?

| Campos                                     |  Valores                                     | 
|---------------------------------------------|------------------------------------------------------| 
| Vulnerabilidad detectada                     |                                                   | 
| Descripción del ataque                 |                                                   | 
| ¿Cómo podemos hacer que sea segura esta entrada?        |                                                     | 



# Parte 2 - XSS
En vistas de los problemas de seguridad que habéis encontrado, empezáis a sospechar que esta aplicación quizás es vulnerable a XSS (Cross Site Scripting).

## Apartado 2a
a) Para ver si hay un problema de XSS, crearemos un comentario que muestre un alert de Javascript siempre que alguien consulte el/los comentarios de aquel jugador (show_comments.php). Dad un mensaje que genere un «alert»de Javascript al consultar el listado de mensajes.

| Campos                                     |  Valores                                     | 
|---------------------------------------------|------------------------------------------------------| 
| Introduzo el mensaje                     |                                                   | 
| En el formulario de la página                 |                                                   | 



## Apartado 2b
b) Por qué dice "&" cuando miráis un link(como elque aparece a la portada de esta aplicación pidiendo que realices un donativo) con parámetros GETdentro de código html si en realidad el link es sólo con "&" ?

| Campos                                     |  Valores                                     | 
|---------------------------------------------|------------------------------------------------------| 
| Explicación                     |                                                   | 

## Apartado 2c
c) Explicad cuál es el problema de show_comments.php, y cómo lo arreglaríais. Para resolver este apartado, podéis mirar el código fuente de esta página.

| Campos                                     |  Valores                                     | 
|---------------------------------------------|------------------------------------------------------| 
| ¿Cúal es el problema?                     |                                                   | 
| Sustityuo el código de la/las líneas...                 |                                                   | 
| ... por el siguiente código...        |                                                     | 


## Apartado 2d
d) Descubrid si hay alguna otra página que esté afectada por esta misma vulnerabilidad. En caso positivo, explicad cómo lo habéis descubierto.

| Campos                                     |  Valores                                     | 
|---------------------------------------------|------------------------------------------------------| 
| Otras páginas afectas                     |                                                   | 
| ¿Como lo he descubierto                 |                                                   | 


# Parte 3 - Control de acceso, autenticación y sesiones de usuarios

## Apartado 3a
a) En el ejercicio 1, hemos visto cómo era inseguro el acceso de los usuarios a la aplicación. En la página de register.php tenemos el registro de usuario. ¿Qué medidas debemos implementar para evitar que el registro sea inseguro? Justifica esas medidas e implementa las medidas que sean factibles en este proyecto.

## Apartado 3b
b) En el apartado de login de la aplicación, también deberíamos implantar una serie de medidas para que sea seguro el acceso, (sin contar la del ejercicio 1.c). Como en el ejercicio anterior, justifica esas medidas e implementa las que sean factibles y necesarias (ten en cuenta las acciones realizadas en el register). Puedes mirar en la carpeta private

## Apartado 3c
c) Volvemos a la página de register.php, vemos que está accesible para cualquier usuario, registrado o sin registrar. Al ser una aplicación en la cual no debería dejar a los usuarios registrarse, qué medidas podríamos tomar para poder gestionarlo e implementa las medidas que sean factibles en este proyecto.

## Apartado 3d
d) Al comienzo de la práctica hemos supuesto que la carpeta private no tenemos acceso, pero realmente al configurar el sistema en nuestro equipo de forma local. ¿Se cumple esta condición? ¿Qué medidas podemos tomar para que esto no suceda?

## Apartado 3e
e) Por último, comprobando el flujo de la sesión del usuario. Analiza si está bien asegurada la sesión del usuario y que no podemos suplantar a ningún usuario. Si no está bien asegurada, qué acciones podríamos realizar e implementarlas.

# Parte 4 - Servidores web
¿Qué medidas de seguridad se implementariaís en el servidor web para reducir el riesgo a ataques?


# Parte 5 - CSRF
Ahora ya sabemos que podemos realizar un ataque XSS. Hemos preparado el siguiente enlace: http://web.pagos/donate.php?amount=100&receiver=attacker, mediante el cual, cualquiera que haga click hará una donación de 100€ al nuestro usuario (con nombre 'attacker') de la famosa plataforma de pagos online 'web.pagos' (Nota: como en realidad esta es una dirección inventada, vuestro navegador os devolverá un error 404).

## Apartado 5a

a) Editad un jugador para conseguir que, en el listado de jugadores (list_players.php) aparezca, debajo del nombre de su equipo y antes de “(show/add comments)” un botón llamado “Profile” que corresponda a un formulario que envíe a cualquiera que haga clic sobre este botón a esta dirección que hemos preparado.

| Campos                                     |  Valores                                     | 
|---------------------------------------------|------------------------------------------------------| 
| En el campo...                     |                                                   | 
| Introduzco...                 |                                                   | 
 
## Apartado 5b
b) Una vez lo tenéis terminado, pensáis que la eficacia de este ataque aumentaría si no necesitara que elusuario pulse un botón.Con este objetivo, cread un comentario que sirva vuestros propósitos sin levantar ninguna sospecha entre los usuarios que consulten los comentarios sobre un jugador (show_comments.php).

## Apartado 5c
c) Pero 'web.pagos' sólo gestiona pagos y donaciones entre usuarios registrados, puesto que, evidentemente, le tiene que restar los 100€ a la cuenta de algún usuario para poder añadirlos a nuestra cuenta.

Explicad qué condición se tendrá que cumplir por que se efectúen las donaciones de los usuarios que visualicen el mensaje del apartado anterior o hagan click en el botón del apartado a).

## Apartado 5d
d) Si 'web.pagos' modifica la página 'donate.php' para que reciba los parámetros a través de POST, quedaría blindada contra este tipo de ataques? En caso negativo, preparad un mensaje que realice un ataque equivalente al de la apartado b) enviando los parámetros “amount” i “receiver” por POST.


