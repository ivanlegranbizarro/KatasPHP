<?php
/* ### Kata 2: Conteo de Palabras
Desarrolla una función que reciba un array de palabras y devuelva un array asociativo con el conteo de cada palabra. */


function contarLetrasCadaPalabra(array $arrayPalabras): array
{
    foreach ($arrayPalabras as $palabra) {
        $diccionario[$palabra] = strlen($palabra);
    }
    return $diccionario;
}


print_r(contarLetrasCadaPalabra(['Iván', 'Alguacil', 'Jirafa']));
