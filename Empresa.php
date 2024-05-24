<?php

class Empresa{

    private $denominacion;
    private $direccion;
    private $colClientes;
    private $colMotos;
    private $colVentas;

    public function __construct($denominacion,$direccion,$colClientes,$colMotos,$colVentas) {

        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colClientes = $colClientes;
        $this->colMotos = $colMotos;
        $this->colVentas = $colVentas;
   
    }

    public function getDenominacion() {
        return $this->denominacion;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getColClientes(){
        return $this->colClientes;
    }
    public function getColMotos(){
        return $this->colMotos;
    }
    public function getColVentas(){
        return $this->colVentas;
    }

    public function setDenominacion($denominacion){
        $this->denominacion = $denominacion;    
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function setColClientes($colClientes){
        $this->colClientes = $colClientes;
    }
    public function setColMotos($colMotos){
        $this->colMotos = $colMotos;
    }
    public function setColVentas($colVentas){
        $this->colVentas = $colVentas;
    }

    private function obtenerValoresCol($col){

        $cadena = "";
        foreach($col as $elemento){
            $cadena = $cadena."".$elemento."\n";

        }

        $cadena;
    }

    public function __toString() {
      
        $cadena.= "Denominacion: ".$this->getDenominacion()."\n".
        $cadena.= "Direccion: ".$this->getDireccion()."\n".
        $cadena.= "Clientes: ". $this->obtenerValoresCol($this->getColClientes())."\n".
        $cadena.= "Motos: ". $this->obtenerValoresCol($this->getColMotos())."\n".
        $cadena = "Ventas: ". $this->obtenerValoresCol($this->getColVentas());

        return $cadena;
    }

    /*Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
    retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro*/ 
    public function retornarMoto($codigoMoto){

        $colMotos = $this->getColMotos();
        $objMoto = null;
        $i=0;
        while ($i<count($colMotos) && $objMoto == null){

            if($colMotos[$i]->getCodigo() == $codigoMoto){
                $objMoto = $colMotos[$i];
            }

            $i++;
        }

        return $objMoto;
    }

    /**Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
    parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
    se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
    Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
    para registrar una venta en un momento determinado.
    El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
    venta. */
     
    public function registrarVenta($colCodigosMoto, $objCliente){

        $motoRetornada = null;
        $colMotos = [];
        $numero = count($this->getColVentas());
        $fecha = date("Y-M-D");
        $precio = 0;
        $colVentas = $this->getColVentas();
        $nuevaVenta = new Venta($numero,$fecha,$objCliente,$colMotos,$precio);
        foreach($colCodigosMoto as $codigoMoto){

           $motoRetornada = $this->retornarMoto($codigoMoto);

           if($motoRetornada != null){

            if($motoRetornada->getActiva() == true && $objCliente->getBaja == true){
                $nuevaVenta->incorporarMoto($motoRetornada);
            }
           }

        }
        if(count($nuevaVenta->getColMotos())>0){
            array_push($colVentas,$nuevaVenta);
            $this->setColVentas($colVentas);
        }

        return $nuevaVenta->getPrecio();

    }

    /**Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
    número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente. */
    
    public function retornarVentasXCliente($tipo,$numDoc){

       $colVentas = $this->getColVentas();
       $colVentaXCliente = [];
       foreach($colVentas as $venta){
        if($venta->getObjClientes->getTipoDocumento == $tipo){
            if($venta->getObjClientes->getNumeroDocumento == $numDoc){
                $colVentaXCliente[]=$venta;
            }
        } 
       }
       return $colVentaXCliente;

    }

    /**Implementar el método informarSumaVentasNacionales() que recorre la colección de ventas realizadas por la
    empresa y retorna el importe total de ventas Nacionales realizadas por la empresa */

    public function informarSumaVentasNacionales(){

        $sumaVentasNacionales = 0;
        $colVenta = $this->getColVentas();

        foreach($colVenta as $venta){
            $sumaVentasNacionales += $venta->retornarTotalVentaNacional();
        }

        return $sumaVentasNacionales;
    }

    /**Implementar el método retornarMotosImportadas() que retorna una colección de motos importadas vinculadas a la
    venta. Si la venta solo se corresponde con motos Nacionales la colección retornada debe ser vacía */

    public function  informarVentasImportadas(){

        $ventasMotosImportadas = [];
        $colVenta = $this->getColVentas();

        foreach($colVenta as $venta){
            $motosImportadas=$venta->retornarMotosImportadas();
            if(count($motosImportadas)>0){
                $ventasMotosImportadas[]=$venta;

            }
           
        }

        return $ventasMotosImportadas;
    }
    
}