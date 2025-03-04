<?php
/* kata-roman-number
Primera Kata per l'especialitat FullstackPHP 19-1-23

Se trata de crear un programa que, dado un número entero(entre 1 y 3999) nos lo traduzca a numeración romana

Recordad que el sistema numérico romano se basa en 7 símbolos:

I = 1
V = 5
X = 10
L = 50
C = 100
D = 500
M = 1000
Y que sigue las siguientes normas:

Ninguna cifra puede repetirse más de tres veces seguidas.
Las letras V, L y D no pueden duplicarse, porque el doble de éstas son:X,C y M
Si se coloca una cifra a la derecha de otra siendo su valor menor o igual que ésta sus valores se suman. XX = 20 CL = 150
Si se coloca una cifra menor a la izquierda de otra, los valores de ambas se restan: IV = 4, IX = 9, XL = 40
Ejemplos:

Input

140
603
2040
55
Output

CXL
DCIII
MMXL
LV */


function convertirNumerosARomanos(int $numero): string
{
    $valores = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I'
    ];
    $numeroRomano = '';

    foreach ($valores as $valor => $romano) {
        while ($numero >= $valor) {
            $numeroRomano .= $romano;
            $numero -= $valor;
        }
    }

    return $numeroRomano;
}


echo convertirNumerosARomanos(140) . PHP_EOL;
echo convertirNumerosARomanos(2040) . PHP_EOL;
echo convertirNumerosARomanos(55) . PHP_EOL;
