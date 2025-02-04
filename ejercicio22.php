<?php

function esPar(int $n): bool
{
    return $n % 2 == 0 ? true : false;
}


var_dump(esPar(2));
var_dump(esPar(3));
