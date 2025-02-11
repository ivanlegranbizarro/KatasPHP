<?php
/* ### 2. Números Primos
Escribe una función que determine si un número es primo o no. Debe devolver true si es primo y false si no lo es. */

function esPrimo(int $num): bool
{
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}


var_dump(esPrimo(4));
var_dump(esPrimo(5));
var_dump(esPrimo(7));
var_dump(esPrimo(2));
var_dump(esPrimo(20));
