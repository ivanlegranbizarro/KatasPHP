<?php

function ordenarArray(array $array): array|false
{
    try {
        foreach ($array as $a) {
            if (!is_int($a)) {
                throw new Exception('El array debe contener solo números', 1);
            }
        }
        sort($array);
        return $array;
    } catch (\Throwable $e) {
        echo $e->getMessage();
        return false;
    }
}


$arrayParaOrdenar = [2, 4, 7, 1];
$arrayMalHecho = [2, 3, 'Pepe'];

print_r(ordenarArray($arrayParaOrdenar));
print_r(ordenarArray($arrayMalHecho));
