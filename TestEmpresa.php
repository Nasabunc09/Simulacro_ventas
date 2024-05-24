<?php

include_once 'Cliente.php';
include_once 'Empresa.php';
include_once 'Venta.php';
include_once 'Moto.php';
include_once 'MotoImportada.php';
include_once 'MotoNacional.php';


$objCliente1 = new Cliente("Cyntia","Nasabun",false,"DNI","34811057");
$objCliente2 = new Cliente("Rocio","Nasabun",false,"DNI","32564852");

$colClientes = [$objCliente1,$objeCliente2];

$objMoto11 = new MotoNacional(11,2230000,2022,"Benelli Imperiale 400",85,true,10);
$objMoto12 = new MotoNacional(12,584000,2021,"Zanella Zr 150 Ohc",70,true,10);
$objMoto13 = new MotoNacional(13,999900,2023,"Zanella Patagonian Eagle 250",55,false,null);

$objMoto14 = new MotoImportada(14,12499900,2020,"Pitbike Enduro Motocross Apollo Aiii 190cc Plr",100,true,"Francia",6244400);

$colMotos = [$bjMoto11,$objMoto12,$objMoto13,$objMoto14];

$colVenta = [];

$empresa = new Empresa("Alta Gama","Av Argentina 123",$colMotos,$colClientes,$colVenta);

/**Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el $objCliente es una
referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos
de motos es la siguiente [11,12,13,14]. Visualizar el resultado obtenido */
$colCodigosMoto1 = [11,12,13,14];
$registrarVenta1 = $empresa->registrarVenta($colCodigosMoto, $objCliente2);
echo "Primer Venta";
echo $registrarVenta1;

/**Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es
una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de
códigos de motos es la siguiente [13,14]. Visualizar el resultado obtenido */

$colCodigosMoto2 = [13,14];
$registrarVenta2 = $empresa->registrarVenta($colCodigosMoto2, $objCliente2);
echo "Segunda Venta";
echo $registrarVenta2;


/**Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es
una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de
códigos de motos es la siguiente [14,2]. Visualizar el resultado obtenido */

$colCodigosMoto3 = [14,2];
$registrarVenta3 = $empresa->registrarVenta($colCodigosMoto3, $objCliente2);
echo "Tercer Venta";
echo $registrarVenta3;


/**Invocar al método informarVentasImportadas(). Visualizar el resultado obtenido. */

echo "Importadas".$venta->informarVentasImportadas();

/**Invocar al método informarSumaVentasNacionales(). Visualizar el resultado obtenido */
echo "Nacionales".$venta->informarSumaVentasNacionales();

/**Realizar un echo de la variable Empresa creada en 2. */
echo $empresa;

?>