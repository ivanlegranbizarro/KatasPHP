<?php

function imprimirArray(array $array): void
{
    foreach ($array as $clave => $valor) {
        echo $clave . ' ' . $valor . PHP_EOL;
    }
}


$amigas = ['Irene', 'Julia', 'Brunilda'];

imprimirArray($amigas);
