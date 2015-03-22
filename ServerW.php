<?php

/**
 * ServerW class
 * 
 * Clase ServerW  Desarrollo Web en Entorno Servidor Ejemplo: Servicio web con comentarios 
 * para generar WSDL automático 
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class ServerW extends SoapClient {

  private static $classmap = array(
                                   );

  public function ServerW($wsdl = "C:\Users\Javier\Dropbox\CicloFormativoGradoSuperior\DAW_DWES\practicas\practica9_serviciosSOAP\servicioW.wsdl.xml", $options = array()) {
    foreach(self::$classmap as $key => $value) {
      if(!isset($options['classmap'][$key])) {
        $options['classmap'][$key] = $value;
      }
    }
    parent::__construct($wsdl, $options);
  }

  /**
   * Obtiene el PVP de un producto a partir de su código 
   *
   * @param string $codigo
   * @return float
   */
  public function getPVP($codigo) {
    return $this->__soapCall('getPVP', array($codigo),       array(
            'uri' => 'http://localhost/CicloFormativoGradoSuperior/DAW_DWES/practicas/practica9_serviciosSOAP/',
            'soapaction' => ''
           )
      );
  }

  /**
   * Devuelve un array con los códigos de todas las familias 
   *
   * @param  
   * @return stringArray
   */
  public function getFamilias() {
    return $this->__soapCall('getFamilias', array(),       array(
            'uri' => 'http://localhost/CicloFormativoGradoSuperior/DAW_DWES/practicas/practica9_serviciosSOAP/',
            'soapaction' => ''
           )
      );
  }

  /**
   * Devuelve un array con los códigos de los productos de una familia 
   *
   * @param string $familia
   * @return stringArray
   */
  public function getProductosFamilia($familia) {
    return $this->__soapCall('getProductosFamilia', array($familia),       array(
            'uri' => 'http://localhost/CicloFormativoGradoSuperior/DAW_DWES/practicas/practica9_serviciosSOAP/',
            'soapaction' => ''
           )
      );
  }

  /**
   * Devuelve el número de unidades que existen en una tienda de un producto 
   *
   * @param string $codigo
   * @param string $tienda
   * @return int
   */
  public function getStock($codigo, $tienda) {
    return $this->__soapCall('getStock', array($codigo, $tienda),       array(
            'uri' => 'http://localhost/CicloFormativoGradoSuperior/DAW_DWES/practicas/practica9_serviciosSOAP/',
            'soapaction' => ''
           )
      );
  }

}

?>
