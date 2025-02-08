<?php
/* 1. Crea un array con los números del 1 al 5 y luego elimina el elemento central. Muestra el array resultante. */

$arrayDelUnoAlCinco = (range(1, 5));
$indiceCentral = floor(count($arrayDelUnoAlCinco) / 2);
array_splice($arrayDelUnoAlCinco, $indiceCentral, 1);


/* 2. Dado el siguiente array asociativo:
```php
$frutas = [
"manzana" => 3,
"plátano" => 2,
"naranja" => 4,
"pera" => 1
];
Ordena el array por valores de mayor a menor y muestra el resultado.
*/
$frutas =  [
    "manzana" => 3,
    "plátano" => 2,
    "naranja" => 4,
    "pera" => 1
];
arsort($frutas);


/* 3. Crea una función que reciba un array de números y devuelva un nuevo array solo con los números que aparecen más de una vez. */

function devolverNumerosRepes(array $array): array
{
    $nuevoArray = [];
    $arrayConValoreSContados = array_count_values($array);
    foreach ($arrayConValoreSContados as $key => $value) {
        if ($value > 1) {
            $nuevoArray[] = $key;
        }
    }
    return $nuevoArray;
}

function devolverNumerosRepesConFilter(array $array): array
{
    return  array_filter($array, function ($item) use ($array) {
        return array_count_values($array)[$item] > 1;
    });
}

function devolverNumerosRepesConForeach(array $array): array
{
    $resultados = [];
    $diccionarioConteo = array_count_values($array);

    foreach ($array as $item) {
        if ($diccionarioConteo[$item] > 1 && !in_array($item, $resultados)) {
            $resultados[] = $item;
        }
    }
    return $resultados;
}

print_r(devolverNumerosRepesConForeach([1, 2, 3, 4, 5, 1, 1, 2, 3, 4, 5, 7]));


/* 4. Crea un array asociativo con 5 países como claves y sus capitales como valores. Después, escribe código que compruebe si "España" existe como clave y, si no existe, la añada con valor "Madrid". */

function añadirEspañaSiNoExiste(array $arrayPaises): array
{
    foreach ($arrayPaises as $pais) {
        if (!isset($pais['España'])) {
            $arrayPaises[] = ['España' => 'Madrid'];
        }
    }
    return $arrayPaises;
}

$paises = [
    ['Francia' => 'París'],
    ['Italia' => 'Roma'],
    ['Portugal' => 'Lisboa'],
    ['Alemania' => 'Berlín'],
    ['Inglaterra' => 'Londres'],
];
