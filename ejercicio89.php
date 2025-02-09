<?php
/* 2. Dado un array de números, crea una función que devuelva un nuevo array donde cada elemento sea la suma de sí mismo y todos los números anteriores.
   Ejemplo: [1,2,3,4] → [1,3,6,10] */


function sumaAnteriores(array $array): array
{
    $resultados = array();
    $acumulado = 0;
    foreach ($array as $num) {
        $acumulado += $num;
        array_push($resultados, $acumulado);
    }
    return $resultados;
}


print_r(sumaAnteriores([1, 2, 3, 4]));
