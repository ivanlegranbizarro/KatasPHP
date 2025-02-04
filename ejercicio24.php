<?php

function contarVocales(string $string): int
{
    $vocales = ['a', 'e', 'i', 'o', 'u'];
    $stringToArray = str_split(strtolower($string));


    $resultado = 0;
    foreach ($stringToArray as $item) {
        if (in_array($item, $vocales)) {
            $resultado++;
        }
    }
    return $resultado;
}


echo contarVocales('Hola');
