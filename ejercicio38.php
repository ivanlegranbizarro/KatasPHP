<?php
/* Es traca de crear un programa que, donada una matriu de paraules, ens retorni la mateixa matriu ordenada en funció de la llargada de les paraules. L'ordre hauria de ser de menys a més gran.

Exemples:

Input

['hola','as','PHP','estudiar']
['chachi','supercaligfragilistipuesquialidoso','esternoclidomastoideo']
['h','',' ','sopa','res']
Output

['as','PHP','hola','estudiar']
['chachi','esternoclidomastoideo','supercaligfragilistipuesquialidoso']
['',' ','h','res','sopa']
 */


function ordenarArray(array $array): array
{
    $diccionario_ordenador = [];
    foreach ($array as $item) {
        $diccionario_ordenador[strlen($item)] = $item;
    }

    ksort($diccionario_ordenador);
    $arrayOrdenador = array_values($diccionario_ordenador);


    return $arrayOrdenador;
}

$arrayPruebas = ['hola', 'as', 'PHP', 'estudiar'];


print_r(ordenarArray($arrayPruebas));
