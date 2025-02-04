<?php

class Cliente
{
    public function __construct(
        private string $nombre,
        private DateTime $fechaNacimiento
    ) {}

    /**
     * Get the value of nombre
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of fechaNacimiento
     */
    public function getFechaNacimiento(): string
    {
        return $this->fechaNacimiento->format('d-m-Y');
    }

    /**
     * Set the value of fechaNacimiento
     */
    public function setFechaNacimiento(DateTime $fechaNacimiento): self
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }
}

class Cuenta
{
    public function __construct(
        private Cliente $cliente,
        private int|float $saldo = 0
    ) {}

    /**
     * Get the value of saldo
     */
    public function getSaldo(): int|float
    {
        return $this->saldo;
    }

    /**
     * Set the value of saldo
     */
    public function setDeposito(int|float $deposito): self
    {
        $this->saldo += $deposito;

        return $this;
    }

    /**
     * Get the value of cliente
     */
    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    /**
     * Set the value of cliente
     */
    public function setCliente(Cliente $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }
}
