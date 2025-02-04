<?php

// El factorial de un número es el producto de todos los enteros positivos menores o iguales que el mismo.

function factorial(int $n): int
{
    $resultado = 1;

    for ($i = 1; $i <= $n; $i++) {
        $resultado *= $i;
    }

    return $resultado;
}


var_dump(factorial(5));
