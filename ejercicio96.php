<?php
/* ### 4. FizzBuzz
Escribe una función que reciba un número n y devuelva un array con los números del 1 al n, pero reemplazando los múltiplos de 3 por "Fizz", los múltiplos de 5 por "Buzz" y los múltiplos de ambos por "FizzBuzz". */

function fizzBuzz(int $numero): array
{
    $arrayFizzBuzz = [];
    for ($i = 1; $i <= $numero; $i++) {
        if ($i % 3 == 0 && $i % 5 == 0) {
            $arrayFizzBuzz[] = 'FizzBuzz';
        } elseif ($i % 3 == 0) {
            $arrayFizzBuzz[] = 'Fizz';
        } elseif ($i % 5 == 0) {
            $arrayFizzBuzz[] = 'Buzz';
        } else {
            $arrayFizzBuzz[] = $i;
        }
    }
    return $arrayFizzBuzz;
}


print_r(fizzBuzz(15));
