<?php

abstract class Empleado
{
    public function __construct(
        private string $nombre,
        private int $edad,
    ) {}

    abstract public function calcularSalario(float $salarioBase): float;

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getEdad(): int
    {
        return $this->edad;
    }

    public function __toString(): string
    {
        return "Nombre: {$this->getNombre()}, Edad: {$this->getEdad()}";
    }
}

class Gerente extends Empleado
{
    public function __construct(
        private string $nombre,
        private int $edad,
        private string $departamento
    ) {
        parent::__construct($nombre, $edad);
    }

    public function getDepartamento(): string
    {
        return $this->departamento;
    }

    public function calcularSalario(float $salarioBase): float
    {
        return $salarioBase * 1.2;
    }

    public function __toString(): string
    {
        return parent::__toString() . ", Departamento: {$this->getDepartamento()}";
    }
}

class Desarrollador extends Empleado
{
    public function __construct(
        private string $nombre,
        private int $edad,
        private array $languages = []
    ) {
        parent::__construct($nombre, $edad);
    }

    public function getLanguages(): string
    {
        return implode(' ', $this->languages);
    }

    public function calcularSalario(float $salarioBase): float
    {
        return $salarioBase * 1.1;
    }

    public function __toString(): string
    {
        return parent::__toString() . ' Lenguajes: ' . $this->getLanguages();
    }
}
