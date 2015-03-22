#Enunciado.#
Vamos a seguir utilizando para esta tarea la base de datos correspondiente a la tienda web.

En primer lugar deberás utilizar el guión de comandos SQL para crear una base de datos de nombre "tarea6", similar a la que usamos en los ejercicios anteriores. Para acceder se usan las credenciales habituales: usuario "dwes" y contraseña "abc123.".

Guión de comandos SQL (0.02 MB)
A continuación utilizarás PHP5 SOAP para crear un servicio web con cuatro funciones que expongan información de la base de datos de la tienda online. De momento no deberás utilizar WSDL. Las funciones son las siguientes:

getPVP. Esta función recibirá como parámetro el código de un producto, y devolverá el PVP correspondiente al mismo.
getStock. Esta función recibirá dos parámetros: el código de un producto y el código de una tienda. Devolverá el stock existente en dicha tienda del producto.
getFamilias. No recibe parámetros y devuelve un array con los códigos de todas las familias existentes.
getProductosFamilia. Recibe como parámetro el código de una familia y devuelve un array con los códigos de todos los productos de esa familia.
El guión PHP que ejecute el servicio ha de llamarse servicio.php. Para comprobar la correcta ejecución del servicio, programa también un cliente con nombre cliente.php que realice una llamada a cada una de las funciones programadas y muestre el resultado obtenido.

Una vez finalizada la parte anterior, crea un nuevo servicio en un guión con nombre serviciow.php, idéntico al anterior, y coméntalo adecuadamente para obtener un WSDL del mismo utilizando la herramienta WSDLDocument. Publica el documento de descripción obtenido, serviciow.wsdl, en el servicio.

Partiendo de este nuevo servicio y de su descripción, utiliza la herramienta wsdl2php para obtener una clase en PHP. Crea un nuevo cliente llamado clientew.php que se base en ésta clase para probar el nuevo servicio, mostrando los resultados obtenidos de forma similar a como hiciste en el caso anterior.

#Criterios de puntuación. Total 10 puntos.#
Se valorará con dos puntos la consecución de cada uno de los siguientes ítems:

Programar correctamente las funciones que se publicarán como parte del servicio web.
Crear de forma correcta servicio.php.
Comentar adecuadamente serviciow.php, para posibilitar la utilización de WSDLDocument.
Se valorará con un punto la consecución de cada uno de los siguientes ítems:

Crear de forma correcta cliente.php.
Crear de forma correcta clientew.php
Utilizar WSDLDocument para obtener el documento de descripción del servicio web y utilizarlo como parte del mismo.
Utilizar wsdl2php para obtener una nueva clase a partir del servicio web.
Recursos necesarios para realizar la Tarea.
Ordenador con PHP, servidor web Apache y entorno de desarrollo NetBeans, correctamente instalado y configurado. Extensión de depuración Xdebug para PHP instalada y funcionando con NetBeans.
Consejos y recomendaciones.
Además del manual online de PHP, es necesario dar libre acceso a Internet para la búsqueda de información.
Indicaciones de entrega.
Una vez realizada la tarea elaborarás un único documento donde figuren las respuestas correspondientes. El envío se realizará a través de la plataforma de la forma establecida para ello, y el archivo se nombrará siguiendo las siguientes pautas:

apellido1_apellido2_nombre_SIGxx_Tarea

Asegúrate que el nombre no contenga la letra ñ, tildes ni caracteres especiales extraños. Así por ejemplo la alumna Begoña Sánchez Mañas para la sexta unidad del MP de DWES, debería nombrar esta tarea como...

sanchez_manas_begona_DWES06_Tarea