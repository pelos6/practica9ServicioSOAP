<?php
require_once('/include/DB.php');
require_once('/include/producto.php');
 /**
 * Clase ServerW
 * 
 * Desarrollo Web en Entorno Servidor
 * Ejemplo: Servicio web con comentarios para generar WSDL automático 
 *          
 */
class ServerW {
    /**
     * Obtiene el PVP de un producto a partir de su código
     * 
     * @param string $codigo
     * @return float    
     */
    public function getPVP($codigo){
      $producto = DB::obtieneProducto($codigo);
      return $producto->getPVP();
    }
 
    /**
     * Devuelve un array con los códigos de todas las familias
     * 
     * @return string[]
     */
    public function getFamilias(){
      $familias = DB::obtieneFamilias();
      return $familias;
    }
 
    /**
     * Devuelve un array con los códigos de los productos de una familia 
     * 
     * @param string $familia
     * @return string[]
     */
    public function getProductosFamilia($familia){
      $productos = DB::obtieneProductosFamilia($familia);
      return $productos;
    }

    /**
     * Devuelve el número de unidades que existen en una tienda de un producto
     * 
     * @param string $codigo
     * @param string $tienda
     * @return int
     */
    public function getStock($codigo, $tienda){
        $stock = DB::obtieneStock($codigo, $tienda);
        return $stock;
    }
}
 
?>