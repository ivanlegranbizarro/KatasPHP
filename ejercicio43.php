<?php

function contadorVocalesMayusculasYMinusculas(string $cadena): array
{
    $vocales = ['a', 'e', 'i', 'o', 'u'];
    $cadenaArray = str_split(strtolower($cadena));
    foreach ($vocales as $vocal) {
        $diccionario[$vocal] = 0;
    }

    foreach ($cadenaArray as $letra) {
        foreach ($vocales as $vocal) {
            if ($letra === $vocal) {
                $diccionario[$vocal] += 1;
            }
        }
    }
    return $diccionario;
}

print_r(contadorVocalesMayusculasYMinusculas('Pepe'));
print_r(contadorVocalesMayusculasYMinusculas('Domingo'));
