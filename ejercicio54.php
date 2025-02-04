<?php
/* ### 1. Invertir una cadena
**Enunciado:** Escribe una función que tome una cadena y devuelva la cadena invertida.
*/

function invertirCadena(string $cadena): string
{
    return strrev($cadena);
}


function invertirCadenaSinStrRev(string $cadena): string
{
    $nuevaCadena = '';
    for ($i = strlen($cadena) - 1; $i >= 0; $i--) {
        $nuevaCadena .= $cadena[$i];
    }

    return $nuevaCadena;
}


echo invertirCadena('hola') . PHP_EOL;
echo PHP_EOL;
echo invertirCadenaSinStrRev('hola') . PHP_EOL;
