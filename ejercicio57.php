<?php

function ordenarArray(array $array): array
{
    sort($array);
    return $array;
}


print_r(ordenarArray([3, 2, 1]));
