<?php
/* ### 6. Capitalizar Palabras
Implementa una función que reciba una cadena de texto y devuelva la misma cadena con la primera letra de cada palabra en mayúscula. */


function capitalizarTodoUnTexto(string $cadena): string
{
    return ucwords($cadena);
}


echo capitalizarTodoUnTexto('hola mundo') . PHP_EOL;
