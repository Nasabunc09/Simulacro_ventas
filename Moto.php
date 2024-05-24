<?php

class Moto {

    

    private $codigo;
    private $costo;
    private $anio;
    private $descripcion;
    private $porcentajeIncremento;
    private $activa;

    public function __construct($codigo, $costo, $anio, $descripcion, $porcentajeIncremento, $activa) {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anio = $anio;
        $this->descripcion = $descripcion;
        $this->$porcentajeIncremento=$porcentajeIncremento;
        $this->activa = $activa;
    }

    public function getCodigo() {
        return $this->codigo;
    }
    public function getCosto() {
        return $this->costo;
    }
    public function getAnio() {
        return $this->anio;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    public function getPorcentajeIncremento() {
        return $this->porcentajeIncremento;
    }
    public function getActiva() {
        return $this->activa;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    public function setCosto($costo){
        $this->costo = $costo;
    }
    public function setAnio($anio){
        $this->anio = $anio;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    public function setPorcentajeIncremento($porcentajeIncremento){
        $this->porcentajeIncremento=$porcentajeIncremento;
    }
    public function setActiva($activa){
        $this->activa = $activa;
    }

    public function __toString(){
        $cadena = "Codigo: ".$this->getCodigo()."\n".
        $cadena .= "Costo: ".$this->getCodigo()."\n".
        $cadena .= "Año: ".$this->getAnio()."\n".
        $cadena .= "Descripciòn: ".$this->getDescripcion()."\n".
        $cadena .= "Porcentaje Incremento: ".$this->getPorcentajeIncremento()."\n".
        $cadena  = "Activa: ".($this->getActiva() ? "Si" : "No")."\n";

        return $cadena;
    }

    public function darPrecioVenta(){
        
        $venta = -1;
        $aniosTransc = $this->getAnio() - intval(date("Y"));
        if($this->getActiva()){
            
            $venta = $this->costo + ($this->getCosto() * ($aniosTransc * $this->getPorcentajeIncremento()));

        }

        return $venta;
    }

}

?>