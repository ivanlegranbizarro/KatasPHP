<?php

class Animal {}

class Perro extends Animal
{
    public function ladrar(): string
    {
        return 'Guau, guau';
    }
}
