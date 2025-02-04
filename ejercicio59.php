<?php
//6. Calcular la suma de los dígitos de un número
//Enunciado: Escribe una función que calcule la suma de los dígitos de un número dado.

function calcularSumaDigitos(string $numero): int
{
    $resultado = 0;
    for ($i = 0; $i < strlen($numero); $i++) {
        $resultado += $i;
    }

    return $resultado;
}


echo calcularSumaDigitos(111) . PHP_EOL;