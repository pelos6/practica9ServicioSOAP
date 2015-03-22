<?php

// la clase tienda
class Tienda {

    protected $codigo;
    protected $nombre;

    public function getCodigo() {
        return $this->codigo;
    }

    public function getNombre() {
        return $this->nombre;
    }

   
    public function __construct($row) {
        $this->codigo = $row['cod'];
        $this->nombre = $row['nombre'];
    }

    
    public function muestra() {
        print "<p>" . $this->codigo . "</p>";
    }

}

?>
