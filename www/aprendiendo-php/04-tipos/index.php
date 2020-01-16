<?php

/*
 TIPOS DE DATOS:
 Entero (int / integer) = 99
 Coma flotante / decimales (float / double) = 3.45
 Cadenas (string) = "Hola yo soy un string"
 Dato lógico (boolean) = true false
 null
 Array (Colección de datos)
 Objetos
 */

$numero_hola = 100;
$decimal = 27.9;
$texto = "Soy un texto $numero_hola";
//$texto = 'Soy un texto ' . $numero_hola;
$verdadero = false;
$nula = null;

echo $texto;

//echo gettype($nula);

// Debug
$mi_nombre[] = 'Santiago Paúl';
$mi_nombre[] = 'Galindo Hidalgo';

var_dump($mi_nombre);
