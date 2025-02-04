<?php

/* Kata 48 per l'especialitat fullstackPHP 21-11-24

Massa sovint em trobo que creeu noms de camps en bases de dades SQL o de camps en JSON que NO estan escrits en snake_case

Per tractar d'evitar això vull que feu un programa que,donat QUALSEVOL string, em retorni l'string en format snake_case.

Input

"hola Mundo"
Output

"hola_mundo" */


function convert_to_snake_case(string $cadena): string
{
    $cadena_lower = strtolower($cadena);
    $remove_start_and_end_white_space = trim($cadena_lower);
    $replace_white_space = str_replace(' ', '_', $remove_start_and_end_white_space);
    return $replace_white_space;
}



echo convert_to_snake_case('Hola Mundo') . PHP_EOL;
echo convert_to_snake_case('Hola Mundo') . PHP_EOL;
