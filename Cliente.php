<?php

class Cliente{

/*
@param String $nombre;
@param String $apellido;
@param boolean $baja;
@param String $tipoDocumento;
@param String $numeroDocumento;
*/

/*Atributos*/
private $nombre;
private $apellido;
private $baja;
private $tipoDocumento;
private $numeroDocumento;


/**Constructor */
public function __construct($nombre, $apellido, $baja, $tipoDocumento, $numeroDocumento) {
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->baja = $baja;
    $this->tipoDocumento = $tipoDocumento;
    $this->numeroDocumento = $numeroDocumento;
}

/*Getter and Setter*/

public function getNombre() {
    return $this->nombre;
}

public function getApellido() {
    return $this->apellido;
}

public function getBaja() {
    return $this->baja;
}
public function getTipoDocumento() {
    return $this->tipoDocumento;
}
public function getNumeroDocumento() {
    return $this->numeroDocumento;
}

public function setNombre($nombre){
    $this->nombre = $nombre;
}

public function setApellido($apellido){
    $this->apellido = $apellido;
}
public function setBaja($baja){
    $this->baja = $baja;
}
public function setTipoDocumento($tipoDocumento){
    $this->tipoDocumento = $tipoDocumento;
}
public function setNumeroDocumento($numeroDocumento){
    $this->numeroDocumento = $numeroDocumento;
}

public function __toString() {

   
    $cadena.= "Nombre: ".$this->getNombre()."\n".
    $cadena.= "Apellido: ".$this->getApellido()."\n".
    $cadena.= "Dado de Baja: ".$this->getBaja()."\n".
    $cadena.= "Tipo Documento: ".$this->getTipoDocumento()."\n".
    $cadena=  "Numero Documento: ".$this->getNumeroDocumento()."\n";

    return $cadena;
}

}