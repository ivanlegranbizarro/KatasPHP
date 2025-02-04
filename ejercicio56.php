<?php
/* ### 3. Comprobar si un número es primo
**Enunciado:** Escribe una función que determine si un número dado es primo. */


function esPrimo(int $numero): bool
{
    for ($i = 2; $i < $numero; $i++) {
        if ($numero % $i === 0) {
            return false;
        }
    }
    return true;
}


echo esPrimo(7) ? 'Es primo' . PHP_EOL : 'No es primo' . PHP_EOL;
echo esPrimo(8) ? 'Es primo' . PHP_EOL : 'No es primo' . PHP_EOL;
