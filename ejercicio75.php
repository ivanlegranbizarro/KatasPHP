<?php
/* ### Kata 1: Filtrado de Números Pares
Crea una función que reciba un array de números enteros y devuelva solo los números pares. */

function filtrarParesDeUnArray(array $arrayNumeros): array
{
    $pares = [];
    foreach ($arrayNumeros as $numero) {
        if ($numero % 2 == 0) {
            $pares[] = $numero;
        }
    }
    return $pares;
}

print_r(filtrarParesDeUnArray([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]));

print_r(filtrarParesDeUnArray([1, 3, 5, 1, 7]));
