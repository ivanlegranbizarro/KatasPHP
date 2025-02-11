# Katas de PHP - Nivel Junior

## Enunciados

### 1. Contador de Vocales
Crea una función que reciba una cadena de texto y devuelva el número de vocales que contiene (a, e, i, o, u, tanto mayúsculas como minúsculas).

### 2. Números Primos
Escribe una función que determine si un número es primo o no. Debe devolver true si es primo y false si no lo es.

### 3. Palíndromo
Implementa una función que verifique si una palabra o frase es un palíndromo (se lee igual de izquierda a derecha que de derecha a izquierda), ignorando espacios y signos de puntuación.

### 4. FizzBuzz
Escribe una función que reciba un número n y devuelva un array con los números del 1 al n, pero reemplazando los múltiplos de 3 por "Fizz", los múltiplos de 5 por "Buzz" y los múltiplos de ambos por "FizzBuzz".

### 5. Suma de Arrays
Crea una función que reciba dos arrays de números de la misma longitud y devuelva un nuevo array con la suma de los elementos en la misma posición.

### 6. Capitalizar Palabras
Implementa una función que reciba una cadena de texto y devuelva la misma cadena con la primera letra de cada palabra en mayúscula.

### 7. Número Más Frecuente
Escribe una función que encuentre el número que más se repite en un array. Si hay varios con la misma frecuencia, devolver el primero de ellos.

### 8. Rotación de Array
Crea una función que rote los elementos de un array k posiciones a la derecha. Por ejemplo, con k=2, [1,2,3,4,5] se convierte en [4,5,1,2,3].

### 9. Validador de Contraseñas
Implementa una función que valide si una contraseña cumple con los siguientes criterios: al menos 8 caracteres, una mayúscula, una minúscula y un número.

### 10. Formatear Tiempo
Escribe una función que convierta un número de segundos en un string con formato "HH:MM:SS".

## Soluciones

### 1. Contador de Vocales
```php
function contarVocales($texto) {
    return preg_match_all('/[aeiou]/i', $texto, $matches);
}
```
Esta solución utiliza una expresión regular con la bandera 'i' para hacer la búsqueda case-insensitive. preg_match_all() cuenta todas las coincidencias de vocales en el texto.

### 2. Números Primos
```php
function esPrimo($numero) {
    if ($numero < 2) return false;
    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i == 0) return false;
    }
    return true;
}
```
Verificamos hasta la raíz cuadrada del número para optimizar. Si encontramos algún divisor, no es primo.

### 3. Palíndromo
```php
function esPalindromo($texto) {
    $texto = preg_replace('/[^a-zA-Z0-9]/', '', strtolower($texto));
    return $texto === strrev($texto);
}
```
Primero limpiamos el texto de espacios y signos, lo convertimos a minúsculas y luego comparamos con su versión invertida.

### 4. FizzBuzz
```php
function fizzBuzz($n) {
    $resultado = [];
    for ($i = 1; $i <= $n; $i++) {
        if ($i % 3 == 0 && $i % 5 == 0) {
            $resultado[] = "FizzBuzz";
        } elseif ($i % 3 == 0) {
            $resultado[] = "Fizz";
        } elseif ($i % 5 == 0) {
            $resultado[] = "Buzz";
        } else {
            $resultado[] = $i;
        }
    }
    return $resultado;
}
```
Evaluamos cada número usando el operador módulo para verificar si es múltiplo de 3, 5 o ambos.

### 5. Suma de Arrays
```php
function sumarArrays($arr1, $arr2) {
    return array_map(function($a, $b) {
        return $a + $b;
    }, $arr1, $arr2);
}
```
Utilizamos array_map() para aplicar una función a cada par de elementos de ambos arrays.

### 6. Capitalizar Palabras
```php
function capitalizarPalabras($texto) {
    return ucwords(strtolower($texto));
}
```
Primero convertimos todo a minúsculas y luego usamos ucwords() para capitalizar cada palabra.

### 7. Número Más Frecuente
```php
function numeroMasFrecuente($arr) {
    $frecuencias = array_count_values($arr);
    arsort($frecuencias);
    return key($frecuencias);
}
```
Usamos array_count_values() para contar frecuencias, ordenamos de mayor a menor y devolvemos la primera clave.

### 8. Rotación de Array
```php
function rotarArray($arr, $k) {
    $k = $k % count($arr);
    return array_merge(
        array_slice($arr, -$k),
        array_slice($arr, 0, -$k)
    );
}
```
Dividimos el array en dos partes y las recombinamos en el orden correcto.

### 9. Validador de Contraseñas
```php
function validarPassword($password) {
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password);
}
```
Usamos una expresión regular que verifica todas las condiciones en una sola línea: mínimo 8 caracteres, al menos una mayúscula, una minúscula y un número.

### 10. Formatear Tiempo
```php
function formatearTiempo($segundos) {
    return sprintf(
        "%02d:%02d:%02d",
        floor($segundos / 3600),
        floor(($segundos % 3600) / 60),
        $segundos % 60
    );
}
```
Convertimos los segundos a horas, minutos y segundos, y formateamos con sprintf para asegurar dos dígitos en cada campo.

Estos ejercicios cubren conceptos importantes como:
- Manipulación de strings y arrays
- Expresiones regulares
- Funciones matemáticas básicas
- Estructuras de control
- Funciones de PHP comunes
- Formateo de datos

¿Te gustaría que profundicemos en alguno de estos ejercicios o que te proponga algunos más específicos para algún área en particular?
