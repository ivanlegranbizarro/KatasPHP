<?php

class Person
{
  public function __construct(public string $nombre, public int $edad) {}

  public function saludar(): string
  {
    return "Hola, mi nombre es {$this->nombre} y tengo {$this->edad}";
  }
}
