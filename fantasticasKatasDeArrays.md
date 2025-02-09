# 20 Katas de Arrays en PHP

## Ejercicios

### Nivel Básico
1. Crea una función que reciba un array y devuelva el mismo array pero con sus elementos en orden inverso, sin usar la función `array_reverse()`.

2. Dado un array de números, crea una función que devuelva un nuevo array donde cada elemento sea la suma de sí mismo y todos los números anteriores.
   Ejemplo: [1,2,3,4] → [1,3,6,10]

3. Implementa una función que reciba un array y elimine todos los elementos duplicados, manteniendo el orden original (sin usar `array_unique()`).

4. Crea una función que reciba un array de números y devuelva un array con dos elementos: el primero será el número que más veces aparece, y el segundo las veces que aparece.

5. Desarrolla una función que "rote" un array n posiciones a la derecha.
   Ejemplo: ([1,2,3,4,5], 2) → [4,5,1,2,3]

### Arrays Asociativos
6. Crea una función que reciba un array asociativo de productos y precios, y devuelva un nuevo array asociativo solo con los productos cuyo precio esté por encima de la media.

7. Dado un array asociativo de estudiantes y notas, crea una función que devuelva un array con los nombres de los estudiantes que han aprobado todas sus asignaturas (nota >= 5).
```php
$notas = [
    "Juan" => ["Mates" => 7, "Lengua" => 6],
    "Ana" => ["Mates" => 4, "Lengua" => 8],
    "Pedro" => ["Mates" => 6, "Lengua" => 7]
];
```

8. Implementa una función que reciba dos arrays asociativos y devuelva un nuevo array con las claves que están en ambos arrays, pero solo cuando los valores asociados sean diferentes.

9. Crea una función que reciba un array asociativo y lo "invierta": las claves se convierten en valores y los valores en claves. Si hay valores duplicados, deberás mantener solo la última ocurrencia.

10. Desarrolla una función que reciba un array asociativo y lo "aplane" en un array simple, donde cada elemento sea la concatenación de la clave y el valor, separados por ":".
    Ejemplo: ["nombre" => "Juan", "edad" => 25] → ["nombre:Juan", "edad:25"]

### Arrays Multidimensionales
11. Crea una función que reciba un array multidimensional y devuelva la suma de todos los números que encuentra, sin importar el nivel de anidamiento.

12. Implementa una función que reciba un array multidimensional y una "ruta" en formato "key1.key2.key3", y devuelva el valor en esa ruta.
    Ejemplo: Para el array `["user" => ["details" => ["name" => "Juan"]]]`, la ruta "user.details.name" devolvería "Juan".

13. Desarrolla una función que "normalice" un array multidimensional de manera que todas las hojas estén al mismo nivel y la ruta hasta cada hoja se convierta en la clave.
    Ejemplo:
```php
["a" => ["b" => 1, "c" => 2]] → ["a.b" => 1, "a.c" => 2]
```

14. Crea una función que reciba un array multidimensional y devuelva todas las "hojas" (valores que no son arrays) en un array unidimensional, manteniendo el orden de profundidad.

15. Implementa una función que compare dos arrays multidimensionales y devuelva un array con las diferencias, indicando si son valores añadidos, eliminados o modificados.

### Retos Avanzados
16. Crea una función que implemente una cola de prioridad usando arrays. Debe permitir añadir elementos con una prioridad y extraer siempre el elemento de mayor prioridad.

17. Desarrolla una función que reciba un array de números y devuelva todos los subarrays contiguos que sumen un número específico.
    Ejemplo: Para el array [1,2,3,4,5] y suma 9, devolvería [[2,3,4], [4,5]]

18. Implementa una función que reciba un array de números y devuelva el subarray continuo cuya suma sea máxima (Problema de Kadane).

19. Crea una función que implemente el algoritmo de "Union Find" usando arrays, con las operaciones de unión y búsqueda, incluyendo compresión de caminos.

20. Desarrolla una función que, dado un array de números y un entero k, devuelva los k elementos más frecuentes usando un heap (implementado con arrays).

## Soluciones

### Solución 1
```php
function invertirArray($arr) {
    $resultado = [];
    for ($i = count($arr) - 1; $i >= 0; $i--) {
        $resultado[] = $arr[$i];
    }
    return $resultado;
}
```

### Solución 2
```php
function sumaCumulativa($arr) {
    $resultado = [];
    $suma = 0;
    foreach ($arr as $num) {
        $suma += $num;
        $resultado[] = $suma;
    }
    return $resultado;
}
```

### Solución 3
```php
function eliminarDuplicados($arr) {
    $resultado = [];
    $vistos = [];
    foreach ($arr as $elemento) {
        if (!in_array($elemento, $vistos)) {
            $resultado[] = $elemento;
            $vistos[] = $elemento;
        }
    }
    return $resultado;
}
```

### Solución 4
```php
function elementoMasFrecuente($arr) {
    $frecuencias = array_count_values($arr);
    $maximo = max($frecuencias);
    $elemento = array_search($maximo, $frecuencias);
    return [$elemento, $maximo];
}
```

### Solución 5
```php
function rotarArray($arr, $n) {
    $n = $n % count($arr);
    return array_merge(
        array_slice($arr, -$n),
        array_slice($arr, 0, count($arr) - $n)
    );
}
```

### Solución 6
```php
function productosSobreMedia($productos) {
    $media = array_sum($productos) / count($productos);
    return array_filter($productos, function($precio) use ($media) {
        return $precio > $media;
    });
}
```

### Solución 7
```php
function estudiantesAprobados($notas) {
    $aprobados = [];
    foreach ($notas as $estudiante => $asignaturas) {
        if (min($asignaturas) >= 5) {
            $aprobados[] = $estudiante;
        }
    }
    return $aprobados;
}
```

### Solución 8
```php
function diferenciasArrays($arr1, $arr2) {
    $diferencias = [];
    foreach ($arr1 as $key => $value) {
        if (isset($arr2[$key]) && $arr2[$key] !== $value) {
            $diferencias[$key] = $value;
        }
    }
    return $diferencias;
}
```

### Solución 9
```php
function invertirAsociativo($arr) {
    $resultado = [];
    foreach ($arr as $key => $value) {
        $resultado[$value] = $key;
    }
    return $resultado;
}
```

### Solución 10
```php
function aplanarAsociativo($arr) {
    $resultado = [];
    foreach ($arr as $key => $value) {
        $resultado[] = "$key:$value";
    }
    return $resultado;
}
```

### Solución 11
```php
function sumarMultidimensional($arr) {
    $suma = 0;
    array_walk_recursive($arr, function($value) use (&$suma) {
        if (is_numeric($value)) {
            $suma += $value;
        }
    });
    return $suma;
}
```

### Solución 12
```php
function obtenerPorRuta($arr, $ruta) {
    $keys = explode('.', $ruta);
    $actual = $arr;
    foreach ($keys as $key) {
        if (!isset($actual[$key])) {
            return null;
        }
        $actual = $actual[$key];
    }
    return $actual;
}
```

### Solución 13
```php
function normalizarArray($arr, $prefijo = '') {
    $resultado = [];
    foreach ($arr as $key => $value) {
        $nuevaKey = $prefijo ? "$prefijo.$key" : $key;
        if (is_array($value)) {
            $resultado = array_merge(
                $resultado,
                normalizarArray($value, $nuevaKey)
            );
        } else {
            $resultado[$nuevaKey] = $value;
        }
    }
    return $resultado;
}
```

### Solución 14
```php
function obtenerHojas($arr) {
    $hojas = [];
    array_walk_recursive($arr, function($value) use (&$hojas) {
        $hojas[] = $value;
    });
    return $hojas;
}
```

### Solución 15
```php
function compararArrays($arr1, $arr2) {
    $diferencias = [
        'añadidos' => [],
        'eliminados' => [],
        'modificados' => []
    ];

    foreach ($arr1 as $key => $value) {
        if (!isset($arr2[$key])) {
            $diferencias['eliminados'][$key] = $value;
        } elseif ($arr2[$key] !== $value) {
            if (is_array($value) && is_array($arr2[$key])) {
                $diferencias['modificados'][$key] = compararArrays($value, $arr2[$key]);
            } else {
                $diferencias['modificados'][$key] = [
                    'anterior' => $value,
                    'nuevo' => $arr2[$key]
                ];
            }
        }
    }

    foreach ($arr2 as $key => $value) {
        if (!isset($arr1[$key])) {
            $diferencias['añadidos'][$key] = $value;
        }
    }

    return $diferencias;
}
```

### Solución 16
```php
class ColaPrioridad {
    private $elementos = [];

    public function añadir($elemento, $prioridad) {
        $this->elementos[] = [
            'elemento' => $elemento,
            'prioridad' => $prioridad
        ];
        usort($this->elementos, function($a, $b) {
            return $b['prioridad'] - $a['prioridad'];
        });
    }

    public function extraer() {
        if (empty($this->elementos)) {
            return null;
        }
        return array_shift($this->elementos)['elemento'];
    }
}
```

### Solución 17
```php
function encontrarSubarraysSuma($arr, $suma) {
    $resultado = [];
    for ($i = 0; $i < count($arr); $i++) {
        $sumaActual = 0;
        for ($j = $i; $j < count($arr); $j++) {
            $sumaActual += $arr[$j];
            if ($sumaActual == $suma) {
                $resultado[] = array_slice($arr, $i, $j - $i + 1);
            }
        }
    }
    return $resultado;
}
```

### Solución 18
```php
function maxSubarraySuma($arr) {
    $maxActual = $maxGlobal = $arr[0];
    for ($i = 1; $i < count($arr); $i++) {
        $maxActual = max($arr[$i], $maxActual + $arr[$i]);
        $maxGlobal = max($maxGlobal, $maxActual);
    }
    return $maxGlobal;
}
```

### Solución 19
```php
class UnionFind {
    private $padre = [];
    private $rango = [];

    public function crear($elementos) {
        foreach ($elementos as $elemento) {
            $this->padre[$elemento] = $elemento;
            $this->rango[$elemento] = 0;
        }
    }

    public function encontrar($elemento) {
        if ($this->padre[$elemento] !== $elemento) {
            $this->padre[$elemento] = $this->encontrar($this->padre[$elemento]);
        }
        return $this->padre[$elemento];
    }

    public function unir($x, $y) {
        $raizX = $this->encontrar($x);
        $raizY = $this->encontrar($y);

        if ($raizX === $raizY) return;

        if ($this->rango[$raizX] < $this->rango[$raizY]) {
            $this->padre[$raizX] = $raizY;
        } elseif ($this->rango[$raizX] > $this->rango[$raizY]) {
            $this->padre[$raizY] = $raizX;
        } else {
            $this->padre[$raizY] = $raizX;
            $this->rango[$raizX]++;
        }
    }
}
```

### Solución 20
```php
function kElementosMasFrecuentes($arr, $k) {
    $frecuencias = array_count_values($arr);
    arsort($frecuencias);
    return array_slice(array_keys($frecuencias), 0, $k);
}
```
