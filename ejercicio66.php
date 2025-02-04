<?php
/* ### 5. Encontrar el par que suma
**Enunciado:** Escribe una función que, dado un array de números y un valor objetivo, encuentre el primer par de números del array que sumen el valor objetivo */

function encuentrapardenumeros(array $numeros, $objetivo): array
{
    for ($i = 1; $i < count($numeros); $i++) {
        if ($numeros[$i - 1] + $numeros[$i] == $objetivo) {
            $parGanador = [$numeros[$i - 1], $numeros[$i]];
            return $parGanador;
        }
    }
    return [];
}


print_r(encuentraParDeNumeros([1, 2, 3, 4, 5], 7));
