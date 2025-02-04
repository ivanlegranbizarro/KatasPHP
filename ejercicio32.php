<?php

class Calculadora
{
    public function sumar(int|float ...$numeros): int|float
    {
        return array_sum($numeros);
    }

    public function restar(int|float ...$numeros): int|float
    {
        $resultado = array_shift($numeros);
        foreach ($numeros as $num) {
            $resultado -= $num;
        }
        return $resultado;
    }

    public function multiplicar(int|float ...$numeros): int|float
    {
        return array_product($numeros);
    }

    public function dividir(int|float $n1, int|float $n2): int|float
    {
        try {
            if ($n2 == 0) {
                throw new DivisionByZeroError("No se puede dividir por cero");
            }
            return $n1 / $n2;
        } catch (DivisionByZeroError $e) {
            echo $e->getMessage();
        }
    }
}
