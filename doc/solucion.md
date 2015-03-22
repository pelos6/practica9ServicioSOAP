#Solución#
1*  Primera parte. Sin fichero WSDL:
*  Los archivos en el directorio include son las clases que se usan de base para este ejercicio.
*  Familia.php, Producto.php y Tienda.php son las clases que instancian las tablas del esquema mySql.
*  DB.php es la clase que ofrece métodos a los servicios.
    *  se encarga de la conexión a base de datos pasando los valores en un array para evitar consultas sin parametrizar.
*  Server.php es la clase que ofrece los métodos de DB.php.
*  servicio.php es el servicio que se publica en http://localhost/CicloFormativoGradoSuperior/DAW_DWES/practicas/practica9_serviciosSOAP/servicio.php
    *  esta en el servidor esperando peticiones.
*  cliente.php es el cliente que usa el servicio publicado por servicio.php y muestra los resultados en un html sencillo.

2*  Segunda parte. Con fichero WSDL:
* Los tres primeros puntos de la parte primera sirven para la segunda.
*  Para generar el fichero WSDL tenemos que comentar el fichero donde se ofrecen los metodos del servicio de forma que el generador pueda tratarlo.
    *  es el fichero ServerW.php igual que Server.php pero con comentarios.
    *  descargo WSDLDocument.php versión 5 
    *  escribo genera.php. Lo cargo en el navegador y genera un html. En el origen de la página esta el xml.
    *  copio ese código en el archivo servicioW.wsdl.xml 
    *  genero el archivo ServerW.php con 
        c:\Bitnami\wampstack-5.5.22-0\php>php.exe -f C:\Bitnami\wampstack-5.5.22-0\php\wsdl2\wsdl2php-0.2.1\bin\wsdl2php.php C:\Users\Javier\Dropbox\CicloFormativoGradoSuperior\DAW_DWES\practicas\practica9_serviciosSOAP\servicioW.wsdl.xml
        Analyzing WSDL.........done
        Generating code...PHP Notice:  Undefined offset: 1 in C:\Bitnami\wampstack-5.5.2
        2-0\php\wsdl2\wsdl2php-0.2.1\bin\wsdl2php.php on line 333
        done
        Writing ServerW.php...done
    *  esto genera el fichero Server.php en el directorio donde esta php.exe (donde lo lanzo)
*    lanzo clienteW.php antes de cambiar el ServerW.php mio por el generado y funciona
*    renombro el fichero ServerW.php mio por ServerWJavier.php y coloco el ServerW.php generado en el directorio del proyecto
*    creo clienteW.php según los apuntes y al lanzarlo me da un error.

        [Sun Mar 22 11:01:35.079318 2015] [:error] [pid 3172:tid 1072] 
        [client ::1:51557] PHP Fatal error:  SOAP-ERROR: Parsing WSDL: 
        Couldn't load from 
        'C:\\Users\\Javier\\Dropbox\\CicloFormativoGradoSuperior\\DAW_DWES\tareas\tarea9_serviciosSOAP\\servicioW.wsdl.xml' : 
        failed to load external entity "file:///C:/Users/Javier/Dropbox/CicloFormativoGradoSuperior/DAW_DWES%09areas%09area9_serviciosSOAP/servicioW.wsdl.xml"\n in C:\\Users\\Javier\\Dropbox\\CicloFormativoGradoSuperior\\DAW_DWES\\tareas\\tarea9_serviciosSOAP\\ServerW.php on line 24, referer: http://localhost/CicloFormativoGradoSuperior/DAW_DWES/practicas/practica9_serviciosSOAP/clienteW.php

* como creo que es que interpreta /t como tabulador lo llevo al directorio practicas/practica9... y deja de dar este fallo

* Ahora da este otro

        [Sun Mar 22 16:41:43.001736 2015] [:error] [pid 4192:tid 988] 
        [client ::1:61376] PHP Fatal error:  Uncaught SoapFault exception: [HTTP] 
        Error Fetching http headers in C:\\Users\\Javier\\Dropbox\\CicloFormativoGradoSuperior\\DAW_DWES\\practicas\\practica9_serviciosSOAP\\ServerW.php:38\nStack trace:\n#0 
        [internal function]: SoapClient->__doRequest('<?xml version="...', 'http://localhos...', 'http://localhos...', 1, 0)\n#1 C:\\Users\\Javier\\Dropbox\\CicloFormativoGradoSuperior\\DAW_DWES\\practicas\\practica9_serviciosSOAP\\ServerW.php(38): SoapClient->__soapCall('getPVP', Array, Array)\n#2 C:\\Users\\Javier\\Dropbox\\CicloFormativoGradoSuperior\\DAW_DWES\\practicas\\practica9_serviciosSOAP\\clienteW.php(30): ServerW->getPVP('3DSNG')\n#3 {main}\n  
        thrown in C:\\Users\\Javier\\Dropbox\\CicloFormativoGradoSuperior\\DAW_DWES\\practicas\\practica9_serviciosSOAP\\ServerW.php on line 38, referer: http://localhost/cicloFormativoGradoSuperior/DAW_DWES/practicas/practica9_serviciosSOAP/clienteW.php

* la directiva soap.wsdl_cache_enabled = 0 y he reiniciaso el servidor 


* En esta segunda parte partimos de nuestro ServerW.php para generar un archivo wsdl.xml que será usado por los que 
quieran consumir nuestro servicio para generarse su ServerW.php

* Corregido alguna ruta que quedaba a /tareas/tarea9 por /practicas/practica9 y el error se mantiene.

* Observo que al validar servicioW.wsdl.xml da estos dos errores  un warning 

        XML validation started.
        C:/Users/Javier/Dropbox/CicloFormativoGradoSuperior/DAW_DWES/practicas/practica9_serviciosSOAP/servicioW.wsdl.xml:20,4
        WARNING: Message "getFamiliasRequest" does not have any child part elements defined. : Messages typically have at least one part defined.

        C:/Users/Javier/Dropbox/CicloFormativoGradoSuperior/DAW_DWES/practicas/practica9_serviciosSOAP/servicioW.wsdl.xml:7,20
        ERROR: src-resolve.4.2: Error al resolver el componente 'soap-enc:Array'. Se ha detectado que 'soap-enc:Array' está en el espacio de nombres 'http://schemas.xmlsoap.org/soap/encoding/', pero no se puede hacer referencia a los componentes de este espacio de nombres desde el documento de esquema 'file:/C:/Users/Javier/Dropbox/CicloFormativoGradoSuperior/DAW_DWES/practicas/practica9_serviciosSOAP/servicioW.wsdl.xml'. Si es el espacio de nombres incorrecto, puede que sea necesario cambiar el prefijo 'soap-enc:Array'. Si es el espacio de nombres correcto, es necesario agregar la etiqueta 'import' correspondiente a 'file:/C:/Users/Javier/Dropbox/CicloFormativoGradoSuperior/DAW_DWES/practicas/practica9_serviciosSOAP/servicioW.wsdl.xml'.

        C:/Users/Javier/Dropbox/CicloFormativoGradoSuperior/DAW_DWES/practicas/practica9_serviciosSOAP/servicioW.wsdl.xml:7,20
        ERROR: src-resolve: No se puede resolver el nombre 'soap-enc:Array' para un componente 'type definition'.




