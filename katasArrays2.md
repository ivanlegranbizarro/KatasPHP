# PHP Array Katas Adicionales para Desarrolladores Junior

## Nuevos Enunciados de Katas de Arrays

### Kata 11: Transformación Condicional
Crea una función que reciba un array de números y transforme cada elemento según una condición específica:
- Si el número es par, multiplícalo por 2
- Si el número es impar, elévalo al cuadrado
- Si el número es divisible por 3, réstale 1

### Kata 12: Anidamiento de Arrays
Desarrolla una función que reciba un array unidimensional y lo convierta en un array multidimensional agrupando elementos cada 3 posiciones.

### Kata 13: Mapeo de Datos Complejо
Implementa una función que reciba un array de estudiantes con propiedades como nombre, calificaciones y cursos, y genere un nuevo array con el promedio de calificaciones por curso.

### Kata 14: Intersección de Conjuntos
Crea una función que reciba dos arrays y devuelva un nuevo array con los elementos comunes, sin duplicados y manteniendo el orden de aparición.

### Kata 15: Análisis de Frecuencia
Desarrolla una función que reciba un array de elementos y devuelva un array asociativo con la frecuencia de cada elemento, ordenado de mayor a menor.

### Kata 16: Validación de Estructura
Implementa una función que verifique si un array multidimensional cumple una estructura específica (por ejemplo, array de usuarios con campos obligatorios).

### Kata 17: Combinación de Arrays
Crea una función que combine dos arrays asociativos, fusionando sus valores cuando tengan la misma clave.

### Kata 18: Filtrado Avanzado
Desarrolla una función que filtre un array de objetos usando múltiples criterios combinados con operadores lógicos.

### Kata 19: Transformación de Matriz
Implementa una función que transforme una matriz cuadrada, convirtiendo cada fila en una columna y viceversa.

### Kata 20: Generación de Subarrays
Crea una función que genere todas las posibles combinaciones de subarrays a partir de un array original.

## Soluciones Explicadas

### Solución Kata 11: Transformación Condicional
```php
function transformArray($numbers) {
    return array_map(function($num) {
        if ($num % 2 == 0) return $num * 2;
        if ($num % 3 == 0) return $num - 1;
        return $num * $num;
    }, $numbers);
}
```
**Explicación:** Utilizamos `array_map()` para aplicar transformaciones según condiciones específicas.

### Solución Kata 12: Anidamiento de Arrays
```php
function nestArray($array) {
    $result = [];
    for ($i = 0; $i < count($array); $i += 3) {
        $result[] = array_slice($array, $i, 3);
    }
    return $result;
}
```
**Explicación:** Dividimos el array original en subarrays de 3 elementos usando `array_slice()`.

### Solución Kata 13: Mapeo de Datos Complejo
```php
function calculateAverageBySubject($students) {
    $courseGrades = [];
    foreach ($students as $student) {
        foreach ($student['calificaciones'] as $course => $grade) {
            $courseGrades[$course][] = $grade;
        }
    }

    return array_map(function($grades) {
        return array_sum($grades) / count($grades);
    }, $courseGrades);
}
```
**Explicación:** Agrupamos calificaciones por curso y calculamos promedios.

### Solución Kata 14: Intersección de Conjuntos
```php
function arrayIntersection($arr1, $arr2) {
    return array_values(array_intersect($arr1, $arr2));
}
```
**Explicación:** Usamos funciones nativas de PHP para encontrar elementos comunes.

### Solución Kata 15: Análisis de Frecuencia
```php
function elementFrequency($array) {
    $freq = array_count_values($array);
    arsort($freq);
    return $freq;
}
```
**Explicación:** Contamos frecuencias y ordenamos de mayor a menor.

### Solución Kata 16: Validación de Estructura
```php
function validateStructure($array, $requiredKeys) {
    return array_filter($array, function($item) use ($requiredKeys) {
        return count(array_intersect_key(array_flip($requiredKeys), $item)) == count($requiredKeys);
    });
}
```
**Explicación:** Validamos que cada elemento tenga todas las claves requeridas.

### Solución Kata 17: Combinación de Arrays
```php
function mergeArrays($arr1, $arr2) {
    return array_merge_recursive($arr1, $arr2);
}
```
**Explicación:** Fusionamos arrays asociativos recursivamente.

### Solución Kata 18: Filtrado Avanzado
```php
function advancedFilter($array, $criteria) {
    return array_filter($array, function($item) use ($criteria) {
        return $criteria($item);
    });
}
```
**Explicación:** Permitimos filtrado con funciones de callback personalizadas.

### Solución Kata 19: Transformación de Matriz
```php
function transposeMatrix($matrix) {
    return array_map(null, ...$matrix);
}
```
**Explicación:** Usando el operador spread y `array_map()` para transponer.

### Solución Kata 20: Generación de Subarrays
```php
function generateSubarrays($array) {
    $result = [[]];
    foreach ($array as $item) {
        $current = $result;
        foreach ($current as $combination) {
            $result[] = array_merge($combination, [$item]);
        }
    }
    return $result;
}
```
**Explicación:** Generamos combinaciones recursivamente añadiendo elementos.
