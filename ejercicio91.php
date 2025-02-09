<?php
/* ### Arrays Asociativos
6. Crea una función que reciba un array asociativo de productos y precios, y devuelva un nuevo array asociativo solo con los productos cuyo precio esté por encima de la media. */


function filtrarArraysPorMedia(array $array): array
{
    $mediaAritmetica = array_sum(array_column($array, 'precio')) / count($array);
    return array_filter($array, function ($item) use ($mediaAritmetica) {
        return $item['precio'] > $mediaAritmetica;
    });
}


$productos = [
    'producto1' => ['precio' => 10],
    'producto2' => ['precio' => 20],
    'producto3' => ['precio' => 30],
];


print_r(filtrarArraysPorMedia($productos));
