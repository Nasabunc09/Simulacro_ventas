<?php   


class Venta{

    private $numero;
    private $fecha;
    private $objClientes;
    private $colMotos;
    private $precio;

    /*Contructor*/

    public function __construct($numero,$fecha,$objClientes,$colMotos,$precio) {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->objClientes = $objClientes;
        $this->colMotos = $colMotos;
        $this->precio = $precio;
    }


    public function getNumero(){
        return $this->numero;
    }

    public function getFecha(){
        return $this->fecha;
    }
    public function getObjClientes(){
        return $this->objClientes;
    }
    public function getColMotos(){
        return $this->colMotos;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function setNumero($numero){
        $this->numero = $numero;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    public function setObjClientes($objClientes){
        $this->objClientes = $objClientes;
    }
    public function setColMotos($colMotos){
        $this->colMotos = $colMotos;
    }
    public function setPrecio($precio){
        $this->precio = $precio;
    }

    private function obtenerValoresCol($col){

        $cadena = "";
        foreach($col as $elemento){
            $cadena = $cadena."".$elemento."\n";

        }

        $cadena;
    }
    public function __toString(){
        
        $cadena = "------------VENTA------------"."\n".
        $cadena.= "Numero Tienda: ".$this->getNumero()."\n". 
        $cadena.= "Fecha: ".$this->getFecha()."\n". 
        $cadena.= "Cliente: -----".$this->getObjClientes()."-----\n".
        $cadena.= "Coleccion Motos: ".$this->colMotosAString()."\n". 
        $cadena = "Precio: ".$this->getPrecio();   

        return $cadena;
    }

    public function colMotosAString(){

        $cadena = "";
        $motos = $this->getColMotos();

        for($i = 0; $i < count($motos); $i++){

            $cadena = $cadena . "Moto n° [".$i."]:\n".$motos[$i]."\n---\n";
        }

        return $cadena;
    }

    /*Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
    incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
    vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
    Utilizar el método que calcula el precio de venta de la moto donde crea necesario.*/ 
    public function incorporarMoto($objMoto){

        if($objMoto->getActiva()){
            $colMotosAux = $this->getColMotos();
            array_push($colMotosCopia,$objMoto);
            $this->setColMotos($colMotosAux);

            $precioMoto = $objMoto->darPrecioVenta();
            $precioFinalAux = $this->getPrecio();
            $precioFinalAux = $precioFinalAux + $precioMoto;
            $this->setPrecio($precioFinalAux);
        }


    }

    /**Implementar el método retornarTotalVentaNacional() que retorna la sumatoria del precio venta de cada una de las
motos Nacionales vinculadas a la venta */
    public function retornarTotalVentaNacional(){

        $motos = $this->getColMotos();
        $totalVentaNacional = 0;

        foreach($motos as $moto){
            if($moto instanceof MotoNacional){
                if($moto->darPrecioVenta() > 0){
                    $totalVentaNacional += $moto->darPrecioVenta();
                }
            }
        }

        return $totalVentaNacional;

    }

    /**Implementar el método retornarMotosImportadas() que retorna una colección de motos importadas vinculadas a la
    venta. Si la venta solo se corresponde con motos Nacionales la colección retornada debe ser vacía.  */
    public function retornarMotosImportadas(){

        $motos = $this->getColMotos();
        $colMotosImportadas = [];

        foreach($motos as $moto){

            if($moto instanceof MotoImportada){
                $colMotosImportadas[] = $moto;
            }
        }

        return $colMotosImportadas;
    }



}

?>