<?php

interface Forma
{
    public function calcularArea();

    public function calcularPerimetro();
}


class Rectangulo implements Forma
{
    public function __construct(public int|float $lado) {}

    public function calcularArea(): int|float
    {
        return $this->lado * $this->lado;
    }

    public function calcularPerimetro(): int|float
    {
        return $this->lado * 4;
    }
}

class Triangulo implements Forma
{
    public function __construct(public int|float $base, public int|float $altura) {}

    public function calcularArea(): int|float
    {
        return $this->base * $this->altura / 2;
    }

    public function calcularPerimetro(): int|float
    {
        return $this->base * 3;
    }
}
