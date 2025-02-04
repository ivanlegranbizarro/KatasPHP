<?php

function sumaDigitos(int $n): int
{
    $convertirNumeroAString = (string) $n;
    $convertirNumeroAArray = str_split($convertirNumeroAString);
    return array_sum($convertirNumeroAArray);
}
