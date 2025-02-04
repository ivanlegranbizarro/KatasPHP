### Katas de PHP

#### Kata 1: Clase Persona

Escribe una clase `Persona` con atributos `nombre`, `edad` y un método `saludar()` que imprima "Hola, mi nombre es X y tengo Y años". Solución a Kata 1

#### Kata 2: Excepción de División por Cero

Escribe una función en PHP que divida dos números e implemente un manejo de excepciones para evitar la división por cero. Solución a Kata 2

#### Kata 3: Validar Email

Escribe una función en PHP que verifique si una cadena de texto es un email válido utilizando expresiones regulares. Solución a Kata 3

#### Kata 4: Reemplazar Elemento en Array

Escribe una función en PHP que reemplace todas las ocurrencias de un valor en un array con otro valor. Solución a Kata 4

#### Kata 5: Leer Archivo

Escribe una función en PHP que lea un archivo de texto y devuelva su contenido. Solución a Kata 5

#### Kata 6: Herencia en Clases

Escribe dos clases `Animal` y `Perro` donde `Perro` herede de `Animal`. La clase `Perro` debe tener un método `ladrar()`. Solución a Kata 6

#### Kata 7: Array Asociativo

Escribe una función en PHP que reciba un array asociativo y lo imprima en formato clave: valor. Solución a Kata 7

#### Kata 8: Manejo de Excepciones Personalizadas

Escribe una clase de excepción personalizada y úsala en una función que valide la edad de una persona. Solución a Kata 8

#### Kata 9: Eliminar Elementos Duplicados

Escribe una función en PHP que elimine los elementos duplicados de un array. Solución a Kata 9

#### Kata 10: Escribir en Archivo

Escribe una función en PHP que escriba un texto en un archivo. Solución a Kata 10

#### Kata 11: Clase Calculadora

Escribe una clase `Calculadora` con métodos para sumar, restar, multiplicar y dividir. Solución a Kata 11

#### Kata 12: Validar URL

Escribe una función en PHP que verifique si una cadena de texto es una URL válida. Solución a Kata 12

#### Kata 13: Invertir Array

Escribe una función en PHP que invierta los elementos de un array. Solución a Kata 13

#### Kata 14: Leer Líneas de Archivo

Escribe una función en PHP que lea todas las líneas de un archivo y las devuelva en un array. Solución a Kata 14

#### Kata 15: Sobrecarga de Métodos

Escribe una clase en PHP que demuestre la sobrecarga de métodos. Solución a Kata 15

#### Kata 16: Validar Número de Teléfono

Escribe una función en PHP que verifique si una cadena de texto es un número de teléfono válido. Solución a Kata 16

#### Kata 17: Array Multidimensional

Escribe una función en PHP que reciba un array multidimensional y lo imprima. Solución a Kata 17

#### Kata 18: Manejo de Excepciones en Lectura de Archivos

Escribe una función en PHP que maneje excepciones al leer un archivo. Solución a Kata 18

#### Kata 19: Clase de Singleton

Escribe una clase en PHP que implemente el patrón de diseño Singleton. Solución a Kata 19

#### Kata 20: Serializar Array

Escribe una función en PHP que serialice un array. Solución a Kata 20

### Soluciones

#### Solución 1: Clase Persona

php

```
class Persona {
    public $nombre;
    public $edad;

    public function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function saludar() {
        echo "Hola, mi nombre es " . $this->nombre . " y tengo " . $this->edad . " años.";
    }
}

```

Volver a Enunciados

#### Solución 2: Excepción de División por Cero

php

```
function dividir($a, $b) {
    try {
        if ($b == 0) {
            throw new Exception("División por cero.");
        }
        return $a / $b;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

```

Volver a Enunciados

#### Solución 3: Validar Email

php

```
function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

```

Volver a Enunciados

#### Solución 4: Reemplazar Elemento en Array

php

```
function reemplazarElemento($array, $buscado, $reemplazo) {
    return array_map(function($elemento) use ($buscado, $reemplazo) {
        return $elemento === $buscado ? $reemplazo : $elemento;
    }, $array);
}

```

Volver a Enunciados

#### Solución 5: Leer Archivo

php

```
function leerArchivo($nombreArchivo) {
    return file_get_contents($nombreArchivo);
}

```

Volver a Enunciados

#### Solución 6: Herencia en Clases

php

```
class Animal {
    public function hacerSonido() {
        echo "Sonido genérico.";
    }
}

class Perro extends Animal {
    public function ladrar() {
        echo "Guau!";
    }
}

```

Volver a Enunciados

#### Solución 7: Array Asociativo

php

```
function imprimirArrayAsociativo($array) {
    foreach ($array as $clave => $valor) {
        echo "$clave: $valor\n";
    }
}

```

Volver a Enunciados

#### Solución 8: Manejo de Excepciones Personalizadas

php

```
class EdadInvalidaException extends Exception {}

function validarEdad($edad) {
    if ($edad < 0 || $edad > 120) {
        throw new EdadInvalidaException("Edad no válida.");
    }
    return true;
}

```

Volver a Enunciados

#### Solución 9: Eliminar Elementos Duplicados

php

```
function eliminarDuplicados($array) {
    return array_unique($array);
}

```

Volver a Enunciados

#### Solución 10: Escribir en Archivo

php

```
function escribirArchivo($nombreArchivo, $contenido) {
    file_put_contents($nombreArchivo, $contenido);
}

```

Volver a Enunciados

#### Solución 11: Clase Calculadora

php

```
class Calculadora {
    public function sumar($a, $b) {
        return $a + $b;
    }

    public function restar($a, $b) {
        return $a - $b;
    }

    public function multiplicar($a, $b) {
        return $a * $b;
    }

    public function dividir($a, $b) {
        if ($b == 0) {
            throw new Exception("División por cero.");
        }
        return $a / $b;
    }
}

```

Volver a Enunciados

#### Solución 12: Validar URL

php

```
function validarURL($url) {
    return filter_var($url, FILTER_VALIDATE_URL);
}

```

Volver a Enunciados

#### Solución 13: Invertir Array

php

```
function invertirArray($array) {
    return array_reverse($array);
}

```

Volver a Enunciados

#### Solución 14: Leer Líneas de Archivo

php

```
function leerLineasArchivo($nombreArchivo) {
    return file($nombreArchivo, FILE_IGNORE_NEW_LINES);
}

```

Volver a Enunciados

#### Solución 15: Sobrecarga de Métodos

php

```
class Sobrecarga {
    public function __call($name, $arguments) {
        switch ($name) {
            case 'metodo':
                if (count($arguments) === 
```

faltan las 5 últimas soluciones

Gracias por señalarlo. Aquí tienes las cinco soluciones que faltaban:

#### Solución 16: Validar Número de Teléfono

php

```
function validarTelefono($telefono) {
    return preg_match('/^\+?[1-9]\d{1,14}$/', $telefono);
}

```

Volver a Enunciados

#### Solución 17: Array Multidimensional

php

```
function imprimirArrayMultidimensional($array) {
    array_walk_recursive($array, function($item, $key) {
        echo "$key: $item\n";
    });
}

```

Volver a Enunciados

#### Solución 18: Manejo de Excepciones en Lectura de Archivos

php

```
function leerArchivoConExcepcion($nombreArchivo) {
    try {
        if (!file_exists($nombreArchivo)) {
            throw new Exception("El archivo no existe.");
        }
        return file_get_contents($nombreArchivo);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

```

Volver a Enunciados

#### Solución 19: Clase de Singleton

php

```
class Singleton {
    private static $instancia;
    private function __construct() {}
    
    public static function getInstancia() {
        if (null === static::$instancia) {
            static::$instancia = new static();
        }
        return static::$instancia;
    }
}

```

Volver a Enunciados

#### Solución 20: Serializar Array

php

```
function serializarArray($array) {
    return serialize($array);
}

```

Volver a Enunciados
