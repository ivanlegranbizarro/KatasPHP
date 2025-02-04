<?php
/*8. Generar la secuencia de Fibonacci hasta un límite
Enunciado: Escribe una función que genere la secuencia de Fibonacci hasta un número dado.*/


function fibonacciConLimite(int $limite): array
{
    $fibonacci = [0, 1];
    for ($i = 2;; $i++) {
        $fibonacci[] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
        if ($fibonacci[$i] >= $limite) {
            break;
        }
    }
    return $fibonacci;
}


print_r(fibonacciConLimite(55));
