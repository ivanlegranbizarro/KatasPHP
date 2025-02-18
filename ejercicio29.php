<?php

// Un número es primo cuando solo es divisible entre 1 y el mismo.

function esPrimo(int $n): bool
{
    for ($i = 2; $i < $n; $i++) {
        if ($n % $i === 0) {
            return false;
        }
    }
    return true;
}


var_dump(esPrimo(4));
var_dump(esPrimo(20));
var_dump(esPrimo(7));
var_dump(esPrimo(13));