<?php
/* 1. Invertir Cadena
Crea una función que invierta una cadena de texto sin utilizar la función `strrev()` de PHP.

**Requisitos:**
- La función debe recibir un string como parámetro
- Debe devolver el string invertido
- No se permite usar la función strrev()
- Debe manejar correctamente strings vacíos

**Ejemplo:**
```php
invertirCadena("hola") // Debe devolver "aloh"
invertirCadena("PHP") // Debe devolver "PHP"
``` */

function invertirCadenaUsandoFor(string $cadena): string
{
    $cadenaInversa = '';
    for ($i = strlen($cadena) - 1; $i >= 0; $i--) {
        $cadenaInversa .= $cadena[$i];
    }
    return $cadenaInversa;
}



echo invertirCadenaUsandoFor("hola") . PHP_EOL;
echo invertirCadenaUsandoFor("PHP") . PHP_EOL;
