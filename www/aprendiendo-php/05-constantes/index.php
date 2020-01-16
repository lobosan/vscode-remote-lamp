<?php

// Constantes
// Es un contenedor de información que no puede variar

define('nombre', 'Santiago Galindo');
define('web', 'desarrolloweb.com');

// echo $nombre;

echo '<h1>' . nombre . '</h1>';
echo '<h1>' . web . '</h1>';

// Variable
$web = 'desarrolloweb.com/academy';
$web = 'desarrolloweb.com/cursos';
echo '<h1>' . $web . '</h1>';

// Constantes predefinidas
echo PHP_OS;
