<?php

/* Escribe una función en PHP que reciba un array multidimensional y lo imprima. Solución a Kata 17 */

function imprimirArrayMultidimensional(array $array): void
{
    foreach ($array as $ar) {
        foreach ($ar as $key => $item) {
            echo $key . ': ' . $item . PHP_EOL;
        }
    }
}

function imprimirArrayMultidimensionalElegantemente(array $array): void
{
    array_walk_recursive($array, function ($item, $key) {
        echo  $key . ': ' . $item . PHP_EOL;
    });
}

$arrayMultiDimensional = [
    [
        'name' => 'John Doe',
        'age' => 25,
        'city' => 'New York'
    ],
    [
        'name' => 'Jane Doe',
        'age' => 30,
        'city' => 'Los Angeles'
    ],
    [
        'name' => 'Bob Smith',
        'age' => 35,
        'city' => 'Chicago'
    ]
];


imprimirArrayMultidimensional($arrayMultiDimensional);
