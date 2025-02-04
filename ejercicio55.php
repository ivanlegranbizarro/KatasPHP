<?php
/* ### 2. Calcular el factorial de un número
**Enunciado:** Escribe una función que calcule el factorial de un número dado.
Ejemplo de salida:

El factorial de 5 es: 120
*/



function calcularFactorial(int $numero): int
{
    $resultado = 1;
    for ($i = 1; $i <= $numero; $i++) {
        $resultado *= $i;
    }

    return $resultado;
}


echo calcularFactorial(5) . PHP_EOL;
