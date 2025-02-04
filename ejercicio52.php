<?php
/* 9. **Generar un array de números primos hasta un límite**:
   Escribe una función que genere un array con todos los números primos hasta un número dado.
*/

function detectarPrimos(int $numero): bool
{
    for ($i = 2; $i < $numero; $i++) {
        if ($numero % $i == 0) {
            return false;
        }
    }
    return true;
}


function generarNumerosPrimoHastaLimite(int $limite): array
{
    if ($limite < 2) {
        return [];
    }

    $numerosPrimos = [];

    for ($i = 1; $i <= $limite; $i++) {
        if (detectarPrimos($i)) {
            $numerosPrimos[] = $i;
        }
    }

    return $numerosPrimos;
}
