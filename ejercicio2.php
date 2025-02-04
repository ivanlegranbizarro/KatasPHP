<?php

function dividirDosNumeros(int|float $n1, int|float $n2): mixed
{
    try {
        if ($n2 == 0) {
            throw new DivisionByZeroError("No se puede dividir por 0");
        }
        return $n1 / $n2;
    } catch (DivisionByZeroError $e) {
        return $e->getMessage();
    }
}


echo dividirDosNumeros(4, 0);
