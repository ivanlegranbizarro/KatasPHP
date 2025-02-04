<?php

/* ### Enunciados

1. **Encontrar el segundo número más grande en un array**:
   Escribe una función que encuentre el segundo número más grande en un array de números. */


function encontrarSegundoNumeroGrandeArray(array $unArray): int
{
    sort($unArray);
    $arrayAlReves = array_reverse($unArray);

    return $arrayAlReves[2];
}

function encontrarSegundoNumeroGrandeArrayAlternativa(array $unArray): int
{
    sort($unArray);

    return $unArray[count($unArray) - 2];
}


$array = [3, 2, 1, 3, 5, 2];

echo encontrarSegundoNumeroGrandeArray($array);

echo '<br>';

echo encontrarSegundoNumeroGrandeArrayAlternativa($array);
