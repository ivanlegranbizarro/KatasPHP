<?php
/* ### 3. Palíndromo
Implementa una función que verifique si una palabra o frase es un palíndromo (se lee igual de izquierda a derecha que de derecha a izquierda), ignorando espacios y signos de puntuación. */


function esPalindromo(string $cadena): bool
{
    $limpiarCadena = str_replace(' ', '', $cadena);
    $limpiarCadena = trim($limpiarCadena);
    return $limpiarCadena === strrev($limpiarCadena);
}


var_dump(esPalindromo('ana'));
var_dump(esPalindromo('anita lava la tina'));
var_dump(esPalindromo('marisco'));
