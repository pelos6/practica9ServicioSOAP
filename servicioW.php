<?php

require_once('ServerW.php');
//Sin WSDL -> uri es obligatorio
// $server = new SoapServer(null, array('uri'=>"aquí poner el directorio donde tengamos el servicio"));
// $server = new SoapServer(null, array('uri'=>"localhost//ServicioBasicoSoap1.php"));
//$server = new SoapServer(null, array('uri' => "http://localhost/CicloFormativoGradoSuperior/DAW_DWES/tareas/tarea9_serviciosSOAP/servicio.php"));
$server = new SoapServer(null, array('uri' => ''));

$server->setClass('ServerW');
$server->handle();
?>