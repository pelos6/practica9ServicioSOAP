<?php
require_once('/include/DB.php');
require_once('/include/producto.php');
 
class Server {
    /**
     * Obtiene el PVP de un producto a partir de su código
     * 
     */
    public function getPVP($codigo){
      $producto = DB::obtieneProducto($codigo);
      return $producto->getPVP();
    }
 
    /**
     * Devuelve un array con los códigos de todas las familias
     * 
     */
    public function getFamilias(){
      $familias = DB::obtieneFamilias();
      return $familias;
    }
    /**
     * Devuelve un array con los códigos de los productos de una familia
     * 
     */
    public function getProductosFamilia($familia){
      $productos = DB::obtieneProductosFamilia($familia);
      return $productos;
    }
 
    /**
     * Devuelve el número de unidades que existen en una tienda de un producto
     * 
     */
    public function getStock($codigo, $tienda){
        $stock = DB::obtieneStock($codigo, $tienda);
        return $stock;
    }
}
 
?>