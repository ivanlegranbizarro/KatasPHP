<?php

function reemplazarElementoArray(array $array, mixed $valorAntiguo, mixed $valorNuevo): array
{
    foreach ($array as $clave => $valor) {
        if ($valor == $valorAntiguo) {
            $array[$clave] = $valorNuevo;
        }
    }
    return $array;
}

function reemplazarElementoArrayConMap(array $array, mixed $valorAntiguo, mixed $valorNuevo): array
{
    return array_map(
        function ($valor) use ($valorAntiguo, $valorNuevo) {
            return $valor === $valorAntiguo ? $valorNuevo : $valorAntiguo;
        },
        $array
    );
}


$amigas = ['Merche', 'Bela', 'Julia'];

var_dump(reemplazarElementoArrayConMap($amigas, 'Merche', 'Irene'));
