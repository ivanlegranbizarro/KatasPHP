<?php

function esPalindromo(string $word): bool
{
    $normalizeWord = strtolower($word);
    $reversedWord = strrev($normalizeWord);
    return $normalizeWord == $reversedWord ? true : false;
}


var_dump(esPalindromo('Ana'));
var_dump(esPalindromo('Perrete'));
