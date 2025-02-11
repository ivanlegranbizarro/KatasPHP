<?php
/* 8. Implementa una función que reciba dos arrays asociativos y devuelva un nuevo array con las claves que están en ambos arrays, pero solo cuando los valores asociados sean diferentes.
 */


function crearDiccionarioDeAcepciones(array $array1, array $array2): array
{
    $nuevoDiccionario = array();
    foreach ($array1 as $clave => $valor) {
        if (array_key_exists($clave, $array2) && $valor != $array2[$clave]) {
            $nuevoDiccionario[$clave] = $array2[$clave];
        }
    }
    return $nuevoDiccionario;
}
