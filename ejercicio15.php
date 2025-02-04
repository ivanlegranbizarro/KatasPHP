<?php
// Escribe una clase que explique cómo funciona la sobrecarga de métodos en PHP

class Calculadora
{
    public function __call($name, $arguments)
    {
        if ($name === 'sumar') {
            switch (count($arguments)) {
                case 2:
                    return $arguments[0] + $arguments[1];
                case 3:
                    return $arguments[0] + $arguments[1] + $arguments[2];
                default:
                    return "Número de argumentos no soportado para el método $name";
            }
        }

        return "El método $name no existe";
    }
}

// Uso
$calc = new Calculadora();
echo $calc->sumar(3, 5); // Resultado: 8
echo PHP_EOL;
echo $calc->sumar(3, 5, 2); // Resultado: 10
echo PHP_EOL;
echo $calc->sumar(3, 5, 2, 4); // Resultado: Número de argumentos no soportado para el método sumar
echo PHP_EOL;
echo $calc->restar(5, 3); // Resultado: El método restar no existe
echo PHP_EOL;
