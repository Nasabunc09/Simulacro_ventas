<?php

class MotoNacional extends Moto{


    private $porcentajeDescuento;


    public function __construct($codigo, $costo, $anio, $descripcion, $porcentajeIncremento, $activa,$porcentajeDescuento){

        parent::__construct($codigo, $costo, $anio, $descripcion, $porcentajeIncremento, $activa);
        $this->porcentajeDescuento = $porcentajeDescuento ?? 15 ; //si no viene por defecto el 15%


    }

    public function getPorcentajeDescuento(){

        return $this->porcentajeDescuento;
    }

    public function setPorcentajeDescuento($porcentajeDescuento){

        $this->porcentajeDescuento=$porcentajeDescuento;

    }

    public function __toString(){

        $cadena = parent::__toString();
        $cadena.= "\n Porcentaje Descuento:".$this->getPorcentajeDescuento();

        return $cadena;

    }

    public function darPrecioVenta(){
        
        $venta = parent::darPrecioVenta();
        if($venta >0){
            
            
            $porcentaje = - ($venta * $this->getPorcentajeDescuento())/100;
            $ventaDesc = $venta - $porcentaje;

        }

        return $ventaDesc;
    }
}

?>