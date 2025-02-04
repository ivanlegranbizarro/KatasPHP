<?php

function validarEdadPersona(int $edad): bool
{
    try {
        if ($edad < 0 || $edad > 150) {
            throw new Exception("La edad debe estar entre 0 y 150");
        }
        return true;
    } catch (\Throwable $th) {
        echo $th->getMessage();
        return false;
    }
}


$edad = -10;
$edad2 = 10;


var_dump(validarEdadPersona($edad));
var_dump(validarEdadPersona($edad2));
