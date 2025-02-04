<?php
/* 10. **Convertir un array asociativo a JSON**:
    Escribe una función que convierta un array asociativo en una cadena JSON.
*/


function convertirArrayAsociativoAJson(array $array): string
{
    return json_encode($array);
}


echo convertirArrayAsociativoAJson(['clave1' => 'valor1', 'clave2' => 'valor2']);
