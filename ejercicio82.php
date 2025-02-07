<?php
/* ### Kata 11: Transformación Condicional
Crea una función que reciba un array de números y transforme cada elemento según una condición específica:
- Si el número es par, multiplícalo por 2
- Si el número es impar, elévalo al cuadrado
- Si el número es divisible por 3, réstale 1 */


function transformarArraySegunCondiciones(array $array): array
{
    return array_map(function ($item) {
        if ($item % 2 === 0) return $item * 2;
        if ($item % 3 === 0) return $item - 1;
        return $item ** 2;
    }, $array);
}



print_r(transformarArraySegunCondiciones([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]));
