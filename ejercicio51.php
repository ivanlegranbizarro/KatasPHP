<?php
/* 8. **Encontrar la subcadena más larga sin caracteres repetidos**:
   Escribe una función que encuentre la subcadena más larga en una cadena sin caracteres repetidos.
*/

function comprobarSiLetraSeRepite(string $cadena): bool
{
    $diccionario = [];

    foreach (str_split($cadena) as $caracter) {
        if (isset($diccionario[$caracter])) {
            return true;
        }
        $diccionario[$caracter] = 1;
    }

    return false;
}

function encontrarSubCadenaMasLarga(string $cadena): string
{
    $subArrayPalabras = explode(' ', $cadena);
    $palabraLarga = '';

    foreach ($subArrayPalabras as $subPalabra) {
        if (!comprobarSiLetraSeRepite($subPalabra) && strlen($subPalabra) > strlen($palabraLarga)) {
            $palabraLarga = $subPalabra;
        }
    }

    return $palabraLarga;
}

echo encontrarSubCadenaMasLarga('Esto es una cadena de texto para encontrar la subcadena mas larga sin caracteres repetidos');
