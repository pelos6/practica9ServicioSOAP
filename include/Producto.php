<?php

// la clase producto
// de la que hereda ordenador
class Producto {

    protected $codigo;
    protected $nombre;
    protected $nombre_corto;
    protected $PVP;
    protected $familia;
    protected $descripcion;

    public function getCodigo() {
        return $this->codigo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPVP() {
        return $this->PVP;
    }

    function getFamilia() {
        return $this->familia;
    }

    function getNombre_corto() {
        return $this->nombre_corto;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    public function __construct($row) {
        $this->codigo = $row['cod'];
        $this->nombre = $row['nombre'];
        $this->nombre_corto = $row['nombre_corto'];
        $this->PVP = $row['PVP'];
        $this->familia = $row['familia'];
        $this->descripcion = $row['descripcion'];
    }

    // Devuelve true si el producto es un ordenador
    public function esOrdenador() {
        if ($this->familia == 'ORDENA') {
            return true;
        } else {
            return false;
        }
    }

    public function muestra() {
        print "<p>" . $this->codigo . "</p>";
    }

}

?>
