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

| Campos                                     |  Valores                                     | 
|---------------------------------------------|------------------------------------------------------| 
| Explicación del ataque                     |  Consiste en usar el programa hydra poniendo dos diccionarios, uno de usuarios con los usuarios más utilizados y el otro diccionario que hemos generado para las contraseñas con las que nos dieron anteriormente, y lo lanzamos a la ruta donde queremos hacer fuerza bruta al login.                                             | 
| Campo de usuario con que el ataque ha tenido éxito                 |     luis                                              | 
| Campo de contraseña con que el ataque ha tenido éxito        |           1234                                          | 


## Apartado 1c
c) Si vais a private/auth.php, veréis que en la función areUserAndPasswordValid”, se utiliza “SQLite3::escapeString()”, pero, aun así, el formulario es vulnerable a SQL Injections, explicad cuál es el error de programación de esta función y como lo podéis corregir.


| Campos                                     |  Valores                                     | 
|---------------------------------------------|------------------------------------------------------| 
| Explicación del error ...                     | La consulta se construye por concatenación directa de cadenas, lo que puede ser explotado en ciertas condiciones.                                             | 
| Solución: Cambiar la línea con el código                |    `$username = SQLite3::escapeString($_POST['username']); $password = SQLite3::escapeString($_POST['password']); $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'"; $result = $db->query($sql); ` | 
| ...por la siguiente línea...        |   `$stmt = $db->prepare('SELECT * FROM users WHERE username = ? AND password = ?'); $stmt->bindValue(1, $_POST['username'], SQLITE3_TEXT); $stmt->bindValue(2, $_POST['password'], SQLITE3_TEXT); $result = $stmt->execute(); `     | 

## Apartado 1d
d) Si habéis tenido éxito con el apartado b), os habéis autenticado utilizando el usuario “luis” (si no habéis tenido éxito, podéis utilizar la contraseña “1234” para realizar este apartado). Con el objetivo de mejorar la imagen de la jugadora “Candela Pacheco”, le queremos escribir un buen puñado de comentarios positivos, pero no los queremos hacer todos con la misma cuenta de usuario.

Para hacer esto, en primer lugar habéis hecho un ataque de fuerza bruta sobre el directorio del servidor web (por ejemplo, probando nombres de archivo) y habéis encontrado el archivo “add_comment.php~”. Estos archivos seguramente se han creado como copia de seguridad al modificar el archivo “.php” original directamente al servidor. En general, los servidores web no interpretan (ejecuten) los archivos “.php~” sino que los muestran como archivos de texto sin interpretar.

Esto os permite estudiar el código fuente de “add_comment.php” y encontrar una vulnerabilidad para publicar mensajes en nombre de otros usuarios. ¿Cuál es esta vulnerabilidad, y cómo es el ataque que utilizáis para explotarla?

| Campos                                     |  Valores                                     | 
|---------------------------------------------|------------------------------------------------------| 
| Vulnerabilidad detectada                     |   `$body = $_POST['body']; $body = SQLite3::escapeString($body); $query = "INSERT INTO comments (playerId, userId, body) VALUES ('".$_GET['id']."', '".$_COOKIE['userId']."', '$body')"; `
                                               | 
| Descripción del ataque                 |   El problema radica en la forma en que los datos son insertados directamente en la consulta SQL sin un manejo adecuado de los mismos para prevenir manipulaciones maliciosas                                             | 

¿Cómo podemos hacer que sea segura esta entrada?        
` if (isset($_POST['body']) && isset($_GET['id'])) {
    # Just in from POST => save to database
    $body = $_POST['body'];
    $playerId = $_GET['id'];
    $userId = $_COOKIE['userId'];
    $stmt = $db->prepare('INSERT INTO comments (playerId, userId, body) VALUES (?, ?, ?)');
    $stmt->bindValue(1, $playerId, SQLITE3_TEXT);
    $stmt->bindValue(2, $userId, SQLITE3_TEXT);
    $stmt->bindValue(3, $body, SQLITE3_TEXT);
    $stmt->execute();
    header("Location: list_players.php");
}`      

# Parte 2 - XSS
En vistas de los problemas de seguridad que habéis encontrado, empezáis a sospechar que esta aplicación quizás es vulnerable a XSS (Cross Site Scripting).

## Apartado 2a
a) Para ver si hay un problema de XSS, crearemos un comentario que muestre un alert de Javascript siempre que alguien consulte el/los comentarios de aquel jugador (show_comments.php). Dad un mensaje que genere un «alert»de Javascript al consultar el listado de mensajes.

| Campos                                     |  Valores                                     | 
|---------------------------------------------|------------------------------------------------------| 
| Introduzo el mensaje                     |          <script>alert('comentario')</script>                                         | 
| En el formulario de la página                 |          Lo he puesto en el apartado Show/add comments de el usuario Gloria Calleja, que se encuentra en la url /web/list_players.php                                         | 

IMG03

## Apartado 2b
b) Por qué dice "&" cuando miráis un link(como el que aparece a la portada de esta aplicación pidiendo que realices un donativo) con parámetros GET dentro de código html si en realidad el link es sólo con "&" ?

| Campos                                     |  Valores                                     | 
|---------------------------------------------|------------------------------------------------------| 
| Explicación                     |   EL & es un carácter especial utilizado para iniciar una entidad de referencia de caracteres, también sirve para enlazar múltiples parámetros en una URL.  | 

## Apartado 2c
c) Explicad cuál es el problema de show_comments.php, y cómo lo arreglaríais. Para resolver este apartado, podéis mirar el código fuente de esta página.

| Campos                                     |  Valores                                     | 
|---------------------------------------------|------------------------------------------------------| 
| ¿Cúal es el problema?                     |      Radica en la vulnerabilidad a ataques de inyección SQL debido al uso inseguro de datos provenientes de la entrada del usuario ($_GET['id']) directamente en una consulta SQL.                                           | 
| Sustituyo el código de la/las líneas...                 |       ` $query = "SELECT commentId, username, body FROM comments C, users U WHERE C.playerId =".$_GET['id']." AND U.userId = C.userId order by C.playerId desc"; ` |
                                          

... por el siguiente código...        ` if (isset($_GET['id'])) {
    $playerId = $_GET['id'];
   $stmt = $db->prepare('SELECT commentId, username, body FROM comments C, users U WHERE C.playerId = ? AND U.userId = C.userId ORDER BY C.playerId DESC');
    $stmt->bindValue(1, $playerId, SQLITE3_INTEGER);
    $result = $stmt->execute();
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo "<div>
              <h4>" . htmlspecialchars($row['username']) . "</h4>
              <p>commented: " . htmlspecialchars($row['body']) . "</p>
              </div>";
    }
} `                 


## Apartado 2d
d) Descubrid si hay alguna otra página que esté afectada por esta misma vulnerabilidad. En caso positivo, explicad cómo lo habéis descubierto.

| Campos                                     |  Valores                                     | 
|---------------------------------------------|------------------------------------------------------| 
| Otras páginas afectadas                     |      list_players.php y add_comment.php                                         | 
| ¿Como lo he descubierto                 |   Porque si me voy al código fuente de la página podremos ver que en el apartad de div hay dos páginas enlazadas que tendrán también esta vulneralibidad porque recogen datos de esta página.                                                | 

IMG04

# Parte 3 - Control de acceso, autenticación y sesiones de usuarios

## Apartado 3a
a) En el ejercicio 1, hemos visto cómo era inseguro el acceso de los usuarios a la aplicación. En la página de register.php tenemos el registro de usuario. ¿Qué medidas debemos implementar para evitar que el registro sea inseguro? Justifica esas medidas e implementa las medidas que sean factibles en este proyecto.

## 1. Uso de Sentencias Preparadas para Evitar Inyecciones SQL
Aunque usas SQLite3::escapeString() para escapar los inputs del usuario, este método no es completamente seguro contra todas las formas de inyección SQL. La mejor práctica es utilizar sentencias preparadas.

## 2. Hashing de Contraseñas
Nunca debes almacenar contraseñas en texto plano. Utiliza una función de hashing robusta como password_hash() para almacenar las contraseñas de forma segura.

## 3. Validación de Entrada del Usuario
Asegúrate de validar las entradas del usuario para evitar entradas maliciosas. Por ejemplo, puedes verificar la longitud de los nombres de usuario y contraseñas y asegurarte de que solo contengan caracteres permitidos.


## 4. Medidas Contra Ataques de Fuerza Bruta
Implementa medidas como CAPTCHAs, límites de intentos de inicio de sesión y bloqueos temporales después de múltiples intentos fallidos para proteger contra ataques de fuerza bruta.

## 5. Uso de HTTPS
Asegúrate de que tu sitio esté configurado para usar HTTPS, protegiendo así la privacidad y seguridad de las comunicaciones entre el navegador del usuario y tu servidor web.

## Apartado 3b
b) En el apartado de login de la aplicación, también deberíamos implantar una serie de medidas para que sea seguro el acceso, (sin contar la del ejercicio 1.c). Como en el ejercicio anterior, justifica esas medidas e implementa las que sean factibles y necesarias (ten en cuenta las acciones realizadas en el register). Puedes mirar en la carpeta private

### Uso de Cookies para Almacenar Contraseñas: 
Almacenar contraseñas directamente en cookies es altamente inseguro porque las cookies pueden ser interceptadas fácilmente mediante ataques de tipo man-in-the-middle o XSS.

Solución: No almacenar contraseñas en cookies. En su lugar, utiliza sesiones para manejar el estado de autenticación. Las sesiones son almacenadas del lado del servidor, y solo un ID de sesión es mantenido en el cliente, lo cual es más seguro.

### Verificación Insegura de Contraseñas: 
El script está comparando contraseñas en texto plano, lo cual no es seguro, especialmente si las contraseñas están almacenadas en hash en la base de datos (como deberían estarlo).

Solución: Usar password_verify() para comparar las contraseñas hasheadas almacenadas en la base de datos con la contraseña proporcionada por el usuario.

### Inyección SQL: 
Aunque se está usando SQLite3::escapeString() para escapar la entrada del usuario, esta función no garantiza seguridad completa contra inyecciones SQL.

Solución: Utilizar sentencias preparadas para evitar inyección SQL completamente.

## Apartado 3c
c) Volvemos a la página de register.php, vemos que está accesible para cualquier usuario, registrado o sin registrar. Al ser una aplicación en la cual no debería dejar a los usuarios registrarse, qué medidas podríamos tomar para poder gestionarlo e implementa las medidas que sean factibles en este proyecto.

### 1. Requerir Autenticación de Usuarios
Dado que el registro de nuevos usuarios es una tarea administrativa, puedes asegurarte de que solo los usuarios autenticados con roles específicos puedan acceder a esta página.

**Implementación:**
Utiliza un sistema de control de acceso basado en roles (RBAC).
Descomenta y/o implementa la funcionalidad en auth.php para verificar si el usuario está autenticado y tiene los permisos necesarios para registrar nuevos usuarios.

### 2. Ocultar o Deshabilitar el Formulario de Registro
Si no se debe permitir el registro desde la interfaz del usuario, puedes simplemente no mostrar el formulario a usuarios no autorizados o incluso eliminar el formulario por completo de la interfaz de usuario, dependiendo de las políticas de la aplicación.

**Implementación:**
Verifica el rol del usuario antes de mostrar el formulario de registro.

### 3. Uso de una Clave o Token de Registro
Para casos en los que el registro deba ser controlado pero permitido bajo ciertas circunstancias, podrías implementar un sistema que requiera una clave de registro o token que sólo los administradores puedan generar.

**Implementación:**
Agrega un campo adicional en el formulario de registro para un "token de registro".
Verifica este token contra una lista de tokens válidos en el servidor antes de permitir el registro.

## Apartado 3d
d) Al comienzo de la práctica hemos supuesto que la carpeta private no tenemos acceso, pero realmente al configurar el sistema en nuestro equipo de forma local. ¿Se cumple esta condición? ¿Qué medidas podemos tomar para que esto no suceda?

**Permisos de archivo:** Asegúrate de que los permisos de archivo y de directorio estén configurados correctamente para la carpeta "private". Esto implica limitar el acceso solo a usuarios autorizados y restringir el acceso de lectura, escritura y ejecución según sea necesario.

**Autenticación y autorización:** Implementa algún sistema de autenticación y autorización para controlar quién puede acceder a la carpeta "private". Esto puede incluir la autenticación mediante contraseñas, tokens de acceso u otros métodos de autenticación seguros.

**Firewall:** Configura un firewall en tu sistema para bloquear el acceso no autorizado a la carpeta "private" desde redes externas o no confiables. Esto puede ayudar a prevenir ataques externos.

**Encriptación:** Considera encriptar la carpeta "private" para proteger su contenido en caso de que alguien logre acceder a ella de manera no autorizada. La encriptación garantiza que incluso si un intruso accede a los archivos, no podrá leer su contenido sin la clave de encriptación adecuada.

## Apartado 3e
e) Por último, comprobando el flujo de la sesión del usuario. Analiza si está bien asegurada la sesión del usuario y que no podemos suplantar a ningún usuario. Si no está bien asegurada, qué acciones podríamos realizar e implementarlas.

**Configuración del servidor web:** Configura el servidor web (como Apache, Nginx, etc.) para que restrinja el acceso a la carpeta "private". Puedes hacer esto mediante la configuración de acceso del servidor web, como el archivo .htaccess en Apache, para negar el acceso directo a la carpeta desde el navegador.

**Autenticación y autorización:** Implementa autenticación y autorización en el servidor web para controlar quién puede acceder a la carpeta "private". Puedes configurar autenticación básica HTTP o autenticación basada en formularios para solicitar credenciales de inicio de sesión antes de permitir el acceso a la carpeta.

**Firewall y filtrado de direcciones IP:** Utiliza un firewall para bloquear el acceso directo a la carpeta "private" desde direcciones IP externas o no autor

# Parte 4 - Servidores web
¿Qué medidas de seguridad se implementariaís en el servidor web para reducir el riesgo a ataques?

**Detección y prevención de intrusiones (IDS/IPS):** Implementa sistemas de detección y prevención de intrusiones para monitorear y analizar el tráfico de red en busca de actividades sospechosas o intentos de ataques. Estos sistemas pueden ayudar a identificar y bloquear ataques en tiempo real.

**Limitación de acceso:** Limita el acceso al servidor web solo a usuarios autorizados y, si es posible, utiliza una red privada o VPN para acceder al servidor de forma remota. Además, considera el uso de autenticación de dos factores para agregar una capa adicional de seguridad a las cuentas de usuario.

**Encriptación:** Utiliza protocolos de encriptación, como HTTPS, para proteger las comunicaciones entre el servidor web y los clientes. Esto es especialmente importante cuando se transmiten datos sensibles, como información de inicio de sesión o detalles de tarjetas de crédito.

**Auditoría de seguridad:** Implementa registros de auditoría para registrar y monitorear las actividades en el servidor web. Esto puede ayudar a detectar intrusiones o intentos de acceso no autorizados y proporcionar información para investigaciones posteriores.

**Respaldo de datos regular:** Realiza copias de seguridad regulares de los datos del servidor web y almacénalos de forma segura fuera del sitio. En caso de un ataque o una pérdida de datos, contar con copias de seguridad actualizadas puede ayudar a restaurar el funcionamiento del servidor rápidamente.

# Parte 5 - CSRF
Ahora ya sabemos que podemos realizar un ataque XSS. Hemos preparado el siguiente enlace: http://web.pagos/donate.php?amount=100&receiver=attacker, mediante el cual, cualquiera que haga click hará una donación de 100€ al nuestro usuario (con nombre 'attacker') de la famosa plataforma de pagos online 'web.pagos' (Nota: como en realidad esta es una dirección inventada, vuestro navegador os devolverá un error 404).

## Apartado 5a

a) Editad un jugador para conseguir que, en el listado de jugadores (list_players.php) aparezca, debajo del nombre de su equipo y antes de “(show/add comments)” un botón llamado “Profile” que corresponda a un formulario que envíe a cualquiera que haga clic sobre este botón a esta dirección que hemos preparado.

| Campos                                     |  Valores                                     | 
|---------------------------------------------|------------------------------------------------------| 
| En el campo...                     |     Team name                                              | 
| Introduzco...                 |     `<body>  <a href="http://web.pagos/donate.php?amount=100&receiver=attacker" class="boton">Profile</a> </body> `   | 

IMG06

## Apartado 5b
b) Una vez lo tenéis terminado, pensáis que la eficacia de este ataque aumentaría si no necesitara que elusuario pulse un botón.Con este objetivo, cread un comentario que sirva vuestros propósitos sin levantar ninguna sospecha entre los usuarios que consulten los comentarios sobre un jugador (show_comments.php).

La opción que he pensado sería de poner este script para que no se levanten sospechas y cuando el usario haga click en Show/Add Comments, le mandará automaticamente a donde tengamos la redirección o donde el script nos mande:

``` html
<script>
function showDonationRequest() {
  const donationRequest = document.getElementById("solicitudDonacion");
  donationRequest.style.display = "block"; // Make the donation request visible
}
</script>

```

## Apartado 5c
c) Pero 'web.pagos' sólo gestiona pagos y donaciones entre usuarios registrados, puesto que, evidentemente, le tiene que restar los 100€ a la cuenta de algún usuario para poder añadirlos a nuestra cuenta.

Explicad qué condición se tendrá que cumplir por que se efectúen las donaciones de los usuarios que visualicen el mensaje del apartado anterior o hagan click en el botón del apartado a).

**Sesión iniciada:** El usuario debe haber iniciado sesión en su cuenta de "web.pagos". Esto asegura que la plataforma pueda identificar al usuario que realiza la donación y debitar los 100€ de su cuenta.

**Fondos suficientes:** El usuario debe tener fondos suficientes en su cuenta para realizar la donación. La plataforma verificará si el saldo disponible del usuario es igual o superior a 100€ antes de procesar la donación.

**Destinatario válido:** El destinatario especificado en la solicitud de donación debe ser un usuario registrado y válido en la plataforma de "web.pagos". Esto garantiza que la donación se dirija correctamente a la cuenta del destinatario.

**Confirmación de la transacción:** Es posible que la plataforma requiera una confirmación adicional por parte del usuario antes de procesar la donación. Esto puede incluir una pantalla de confirmación donde el usuario debe revisar los detalles de la transacción antes de completarla.

## Apartado 5d
d) Si 'web.pagos' modifica la página 'donate.php' para que reciba los parámetros a través de POST, quedaría blindada contra este tipo de ataques? En caso negativo, preparad un mensaje que realice un ataque equivalente al de la apartado b) enviando los parámetros “amount” i “receiver” por POST.

Este código simula cómo un atacante podría manipular los parámetros de la solicitud de donación para enviar una donación fraudulenta y estaremos enviando los parámetros "amount" y receiver" por POST: 

``` html

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ataque simulado</title>
<script>
function simulateAttack() {
  // Aquí se crea el formulario
  var form = document.createElement("form");
  form.setAttribute("method", "post");
  form.setAttribute("action", "http://web.pagos/donate.php");

  // Se añaden los parámetros manipulados
  var amountInput = document.createElement("input");
  amountInput.setAttribute("type", "hidden");
  amountInput.setAttribute("name", "amount");
  amountInput.setAttribute("value", "1000000"); // Valor manipulado
  form.appendChild(amountInput);

  var receiverInput = document.createElement("input");
  receiverInput.setAttribute("type", "hidden");
  receiverInput.setAttribute("name", "receiver");
  receiverInput.setAttribute("value", "attacker@example.com"); // Valor manipulado
  form.appendChild(receiverInput);

  // Aqui se agrega al formulario al cuerpo del documento y enviarlo
  document.body.appendChild(form);
  form.submit();
}
</script>
</head>
<body>
  <button onclick="simulateAttack()">Realizar donación</button>
</body>
</html>


```
