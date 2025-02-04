<?php
/* Given an array of numbers, check if any of the numbers are the character codes for lower case vowels (a, e, i, o, u).

If they are, change the array value to a string of that vowel.

Return the resulting array. */


function sustiTuyeVocalesPorCodigoASCII(array $array): array
{
    $asciiCodes = [
        97 => 'a',
        101 => 'e',
        105 => 'i',
        111 => 'o',
        117 => 'u'
    ];

    foreach ($array as $key => $value) {
        if (isset($asciiCodes[$value])) {
            $array[$key] = $asciiCodes[$value];
        }
    }

    return $array;
}


$numeros = [1, 2, 3, 4];

$numerosASCII = [97, 1, 2, 3, 105];

var_dump(sustiTuyeVocalesPorCodigoASCII($numeros));

var_dump(sustiTuyeVocalesPorCodigoASCII($numerosASCII));
