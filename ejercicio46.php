<?php
/* 2. **Comprobar si dos strings son anagramas**:
   Escribe una función que determine si dos cadenas son anagramas (contienen los mismos caracteres en diferente orden).
 */

function comprobarAnagrama(string $cadena1, string $cadena2): bool
{
    $array1 = str_split($cadena1);
    $array2 = str_split($cadena2);

    if (array_diff($array1, $array2) === []) {
        return true;
    }

    return false;
}


echo comprobarAnagrama('hola', 'aloh') ? 'Son anagramas' : 'No son anagramas';
echo PHP_EOL;
echo comprobarAnagrama('pepe', 'coche') ? 'Son anagramas' : 'No son anagramas';
echo PHP_EOL;
