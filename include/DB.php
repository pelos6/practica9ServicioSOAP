<?php

// la clase DB
// los php requeridos que son otras dos clases
require_once('Producto.php');
require_once('Familia.php');
require_once('Tienda.php');

//require_once('Ordenador.php');

class DB {

// con metodos estaticos dado que no se va a instanciar esta clase
// pasando los valores como array para evitar consultas sin parametrizar
//    protected static function ejecutaConsulta($sql) {
    protected static function ejecutaConsulta($sql, $valores = null) {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=tarea6";
        $usuario = 'dwes';
        $contrasena = 'abc123.';

        $dwes = new PDO($dsn, $usuario, $contrasena, $opc);
        $resultado = null;
//        if (isset($dwes)) {
//            $resultado = $dwes->query($sql);
//        }
        if (isset($dwes)) {
            $resultado = $dwes->prepare($sql);
            $resultado->execute($valores);
        }
        return $resultado;
    }

    // obtiene los productos de la tabla producto
    public static function obtieneProductos() {
        // faltaba descripcion
        $sql = "SELECT cod, nombre_corto, nombre, PVP,descripcion, familia FROM producto;";
        // $resultado = self::ejecutaConsulta($sql);
        $resultado = self::ejecutaConsulta($sql, null);
        $productos = array();

        if ($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $productos[] = new Producto($row);
                $row = $resultado->fetch();
            }
        }

        return $productos;
    }
  // obtiene los productos de la tabla tienda
    public static function obtieneTiendas() {
        // faltaba descripcion
        $sql = "SELECT cod, nombre FROM tienda;";
        // $resultado = self::ejecutaConsulta($sql);
        $resultado = self::ejecutaConsulta($sql, null);
        $tiendas = array();

        if ($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $tiendas[] = new Tienda($row);
                $row = $resultado->fetch();
            }
        }
        return $tiendas;
    }
    // obtiene los codigos de las familias
    public static function obtieneFamilias() {
        $sql = "SELECT cod /*, nombre*/ FROM familia;";
        // $resultado = self::ejecutaConsulta($sql);
        $resultado = self::ejecutaConsulta($sql, null);
        $familias = array();

        if ($resultado) {
            $row = $resultado->fetchColumn(0);
            while ($row != null) {
                $familias[] = $row;
                $row = $resultado->fetchColumn(0);
            }
        }

        return $familias;
    }

    // obtiene un ordenador de la tabla ordenador
    public static function obtieneOrdenador($codigo) {
        // como ordenador hereda de producto necesito todos sus atributos
        $sql = "SELECT o.cod,nombre_corto, nombre, PVP,descripcion, familia, procesador,RAM, disco,grafica,unidadoptica,SO, otros FROM ordenador o , producto p";
        $sql .= " WHERE o.cod = p.cod and o.cod='" . $codigo . "'";
//        error_log("JAVIER el sql de obtieneOrdenador " . $sql);
        $resultado = self::ejecutaConsulta($sql, null);
        $ordenador = null;

        if (isset($resultado)) {
            $row = $resultado->fetch();
            $ordenador = new Ordenador($row);
            // error_log("JAVIER ordenador->codigo " . $ordenador->getcodigo());
            if (method_exists('Ordenador', 'muestra')) {
                // $ordenador->muestra();
                error_log("JAVIER existe ordenador->muestra");
            }
            if (method_exists('Ordenador', 'noExiste')) {
                $ordenador->noExiste();
                error_log("JAVIER existe ordenador->noExiste");
            } else {
                error_log("JAVIER NO existe ordenador->noExiste");
            }
        }

        return $ordenador;
    }

    // obtiene un producto de la tabla producto
    public static function obtieneProducto($codigo) {
        $sql = "SELECT cod , nombre_corto , nombre , PVP , descripcion ,familia FROM producto";
        $sql .= " WHERE cod='" . $codigo . "'";
//        error_log("despues de la llamada al sql " . $sql);
        $resultado = self::ejecutaConsulta($sql);
        $producto = null;

        if (isset($resultado)) {
            $row = $resultado->fetch();
            $producto = new Producto($row);
        }

        return $producto;
    }

    // obtiene los codigos de los productos de la familia pasada por código
    public static function obtieneProductosFamilia($familia) {
//        $sql = "SELECT cod /*, nombre_corto , nombre , PVP , descripcion ,familia*/ FROM producto";
        $sql = "SELECT cod  FROM producto";
        $sql .= " WHERE familia='" . $familia . "'";
        $resultado = self::ejecutaConsulta($sql);
        $productos = array();
        if ($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $row = $resultado->fetchColumn(0);
            while ($row != null) {
                $productos[] = $row;
                $row = $resultado->fetchColumn(0);
            }
        }
        return $productos;
    }

    // verifica que un usuario existe en la tabla usuarios
    public static function verificaCliente($nombre, $contrasena) {
        $sql = "SELECT usuario FROM usuarios ";
        $sql .= "WHERE usuario=:user ";
        $sql .= "AND contrasena=:contrasena";
        $resultado = self::ejecutaConsulta($sql, array('user' => $nombre, 'contrasena' => md5($contrasena)));
        $verificado = false;

        if (isset($resultado)) {
            $fila = $resultado->fetch();
            if ($fila !== false)
                $verificado = true;
        }
        return $verificado;
    }

    // obtiene el stock de un producto en una tienda
    public static function obtieneStock($codigo, $tienda) {
        error_log("antes de la llamada al sql");
        $sql = "SELECT unidades FROM stock ";
        $sql .= " WHERE producto='" . $codigo . "'";
        $sql .= " and tienda='" . $tienda . "'";
        error_log("despues de la llamada al sql " . $sql);
        $resultado = self::ejecutaConsulta($sql);

        if (isset($resultado)) {
            $stock = $resultado->fetchColumn(0);
        }
        return $stock;
    }

}

?>
