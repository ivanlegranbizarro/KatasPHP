<?php
/* ### 1. Contador de Vocales
Crea una función que reciba una cadena de texto y devuelva el número de vocales que contiene (a, e, i, o, u, tanto mayúsculas como minúsculas). */

function contarVocales(string $cadena): array
{
    $vocales = ['a', 'e', 'i', 'o', 'u'];
    foreach ($vocales as $vocal) {
        $diccionarioVocales[$vocal] = 0;
    }
    $cadenaTransformada = str_split(strtolower($cadena));
    foreach ($cadenaTransformada as $letra) {
        if (isset($diccionarioVocales[$letra])) {
            $diccionarioVocales[$letra]++;
        }
    }
    return $diccionarioVocales;
}

print_r(contarVocales('Hola. ¿Estas bien?'));
