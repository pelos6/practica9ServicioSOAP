<?php

require_once('Server.php');
//Sin WSDL -> uri es obligatorio
// $server = new SoapServer(null, array('uri'=>"aquí poner el directorio donde tengamos el servicio"));
// $server = new SoapServer(null, array('uri'=>"localhost//ServicioBasicoSoap1.php"));
// $server = new SoapServer(null, array('uri' => "patata")); // parece que funciona con esto !!!!
$server = new SoapServer(null, array('uri' => "http://localhost/CicloFormativoGradoSuperior/DAW_DWES/tareas/tarea9_serviciosSOAP"));

$server->setClass('Server');
$server->handle();
?>
