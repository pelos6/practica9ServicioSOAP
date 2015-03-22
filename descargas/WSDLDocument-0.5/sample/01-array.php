<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

// ----- YOUR APPLICATION DEFINITIONS

class Primes
{
    /**
     * @param  integer
     * @return integer[]
     */
    public function find($limit){}
}

// ----- USAGE

require '../WSDLDocument.php';
$wsdl = new WSDLDocument('Primes');
header('Content-Type: text/xml');
echo $wsdl->saveXML();
