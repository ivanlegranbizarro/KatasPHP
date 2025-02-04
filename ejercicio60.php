<?php
/*Comprobar si una cadena es un palíndromo
Enunciado: Escribe una función que determine si una cadena es un palíndromo (se lee igual de izquierda a derecha que de derecha a izquierda).*/


function comprobarPalindromo(string $cadena): bool
{
    $cadena = strtolower($cadena);
    return $cadena == strrev($cadena);
}

var_dump(comprobarPalindromo('pepe'));
var_dump(comprobarPalindromo('Ana'));
