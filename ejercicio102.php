<?php
/* kata-make-groups

Kata 53 per l'especialitat fullstackPHP 6-2-25

Imagina que estàs dirigint una dinàmica grupal i has de fer N grups amb els/les alumn@s assistents a la dinàmica.

Cada alumn@ està representat/d per un nom.

Fes un programa que, donats aquests noms i un número N, et generi, aleatòriament, N grups on es distribueixin tots aquests alumnes(sense repetició).

Input

    ["Pere","Joan","Jesús","Mayte","Julia"] 2

Output

    Grup 1: Joan Julia
    Grup 2: Pere Joan Mayte
*/


function ferGrups(array $arrayParticipants, int $numGrups): string
{
    shuffle($arrayParticipants);
    $arrayGrups = array_chunk($arrayParticipants, $numGrups);
    $stringARetornar = '';
    foreach ($arrayGrups as $key => $value) {
        $stringARetornar .= 'Grup ' . ($key + 1) . ': ' . implode(', ', $value) . "\n";
    }
    return $stringARetornar;
}


$participants = ["Pere", "Joan", "Jesús", "Mayte", "Julia"];


echo ferGrups($participants, 2);
