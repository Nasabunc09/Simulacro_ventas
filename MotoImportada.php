<?php

class MotoImportada extends Moto{

    private $pais;
    private $impuestoImportacion;

    public function __construct($codigo, $costo, $anio, $descripcion, $porcentajeIncremento, $activa, $pais,$impuestoImportadora) {

       parent::__construct($codigo, $costo, $anio, $descripcion, $porcentajeIncremento, $activa);
       $this->pais;
       $this->impuestoImportacion;
    }

    public function getPais(){
        return $this->pais;
    }

    public function setPais($pais){
        $this->$pais = $pais;
    }

    public function getImpuestoImportacion(){
        return $this->impuestoImportacion;

    }

    public function setImpuestoImportacion($impuestoImportacion){
        $this->impuestoImportacion=$impuestoImportacion;
    }

    public function __toString(){
        $cadena = parent::__toString();
        $cadena.= "Pais:".$this->getPais()."\n".
        $cadena.= "Impuesto Importacion:".$this->getImpuestoImportacion()."\n";

        return $cadena;
    }

    public function darPrecioVenta(){
        
        $venta = parent::darPrecioVenta();
        
        if($venta > 0){
            
            
            $venta +=  $this->getImpuestoImportacion();
        

        }

        return $venta;
    }




}

?>