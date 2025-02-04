<?php

function eliminarElementosDuplicados(array $array): array
{
    return array_unique($array);
}


$amigas = ['Irene', 'Irene', 'Brunilda', 'Noa'];

var_dump(eliminarElementosDuplicados($amigas));
