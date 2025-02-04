<?php

class Calculadora
{
    public function sumar(int $num1, int $num2): int
    {
        return $num1 + $num2;
    }

    public function restar(int $num1, int $num2): int
    {
        return $num1 - $num2;
    }

    public function multiplicar(int $num1, int $num2): int
    {
        return $num1 * $num2;
    }

    public function dividir(int $num1, int $num2): int|string|float
    {
        try {
            if ($num2 == 0) {
                throw new DivisionByZeroError("Error: No se puede dividir por cero");
            }
            return round($num1 / $num2, 2);
        } catch (DivisionByZeroError $e) {
            return $e->getMessage();
        }
    }
}


$calculadora = new Calculadora();

echo $calculadora->sumar(4, 3) . PHP_EOL;
echo $calculadora->dividir(4, 3) . PHP_EOL;
echo $calculadora->dividir(4, 0) . PHP_EOL;
