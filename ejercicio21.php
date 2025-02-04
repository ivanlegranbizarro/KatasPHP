<?php
/* Task
Given an array/list [] of integers , Construct a product array Of same size Such That prod[i] is equal to The Product of all the elements of Arr[] except Arr[i].

Notes
Array/list size is at least 2 .

Array/list's numbers Will be only Positives

Repetition of numbers in the array/list could occur.

[1, 2, 3, 4]

[24, 12, 8, 6]

*/


function arregloDeProductos(array $array): array
{
    $nuevoArray = [];

    for ($i = 0; $i < count($array); $i++) {
        $resultado = 1;
        for ($j = 0; $j < count($array); $j++) {
            if ($i != $j) {
                $resultado *= $array[$j];
            }
        }
        $nuevoArray[$i] = $resultado;
    }



    return $nuevoArray;
}


$numeros = [1, 2, 3, 4];



print_r(arregloDeProductos($numeros));
