<?php

/* ### 7. Comprimir cadena
**Enunciado:** Escribe una función que comprima una cadena contando las repeticiones consecutivas de cada carácter. Por ejemplo: "AABBBCCCC" → "A2B3C4". */


function comprimirCadena(string $cadena): string
{
    $cadenaToArray = str_split($cadena);
    $resultado = '';

    foreach ($cadenaToArray as $item) {
        if (!isset($diccionario[$item])) {
            $diccionario[$item] = 1;
        } else {
            $diccionario[$item]++;
        }
    }

    foreach ($diccionario as $key => $value) {
        $resultado .= $key . $value;
    }
    return $resultado;
}


echo comprimirCadena('AABBBCCCC');
