## Katas y Soluciones

### 1. Invertir una cadena
**Enunciado:** Escribe una función que tome una cadena y devuelva la cadena invertida.

### 2. Calcular el factorial de un número
**Enunciado:** Escribe una función que calcule el factorial de un número dado.

### 3. Comprobar si un número es primo
**Enunciado:** Escribe una función que determine si un número dado es primo.

### 4. Ordenar un array de números
**Enunciado:** Escribe una función que ordene un array de números en orden ascendente.

### 5. Encontrar el número faltante en un array
**Enunciado:** Escribe una función que encuentre el número faltante en un array de números consecutivos.

### 6. Calcular la suma de los dígitos de un número
**Enunciado:** Escribe una función que calcule la suma de los dígitos de un número dado.

### 7. Comprobar si una cadena es un palíndromo
**Enunciado:** Escribe una función que determine si una cadena es un palíndromo (se lee igual de izquierda a derecha que de derecha a izquierda).

### 8. Generar la secuencia de Fibonacci hasta un límite
**Enunciado:** Escribe una función que genere la secuencia de Fibonacci hasta un número dado.

### 9. Encontrar el elemento más común en un array
**Enunciado:** Escribe una función que encuentre el elemento más común en un array.

### 10. Convertir un número a palabras
**Enunciado:** Escribe una función que convierta un número entero en su representación en palabras (por ejemplo, 123 -> "ciento veintitrés").

---

## Soluciones

### 1. Invertir una cadena
```php
function invertirCadena($cadena) {
    return strrev($cadena);
}
```

### 2. Calcular el factorial de un número
```php
function factorial($n) {
    if ($n <= 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}
```

### 3. Comprobar si un número es primo
```php
function esPrimo($n) {
    if ($n <= 1) {
        return false;
    }
    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}
```

### 4. Ordenar un array de números
```php
function ordenarArray($array) {
    sort($array);
    return $array;
}
```

### 5. Encontrar el número faltante en un array
```php
function encontrarFaltante($array) {
    $n = count($array) + 1;
    $sumaTotal = $n * ($n + 1) / 2;
    $sumaArray = array_sum($array);
    return $sumaTotal - $sumaArray;
}
```

### 6. Calcular la suma de los dígitos de un número
```php
function sumaDigitos($numero) {
    $suma = 0;
    while ($numero != 0) {
        $suma += $numero % 10;
        $numero = (int)($numero / 10);
    }
    return $suma;
}
```

### 7. Comprobar si una cadena es un palíndromo
```php
function esPalindromo($cadena) {
    $cadena = str_replace(' ', '', $cadena);
    $cadena = strtolower($cadena);
    return $cadena == strrev($cadena);
}
```

### 8. Generar la secuencia de Fibonacci hasta un límite
```php
function fibonacci($limite) {
    $secuencia = [0, 1];
    while ($secuencia[count($secuencia) - 1] + $secuencia[count($secuencia) - 2] <= $limite) {
        $secuencia[] = $secuencia[count($secuencia) - 1] + $secuencia[count($secuencia) - 2];
    }
    return $secuencia;
}
```

### 9. Encontrar el elemento más común en un array
```php
function elementoMasComun($array) {
    $frecuencia = array_count_values($array);
    arsort($frecuencia);
    return array_key_first($frecuencia);
}
```

### 10. Convertir un número a palabras
```php
function numeroAPalabras($numero) {
    $unidades = ["", "uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve"];
    $decenas = ["", "diez", "veinte", "treinta", "cuarenta", "cincuenta", "sesenta", "setenta", "ochenta", "noventa"];
    $especiales = ["once", "doce", "trece", "catorce", "quince", "dieciséis", "diecisiete", "dieciocho", "diecinueve"];

    if ($numero < 10) {
        return $unidades[$numero];
    } elseif ($numero >= 11 && $numero <= 19) {
        return $especiales[$numero - 11];
    } else {
        $decena = (int)($numero / 10);
        $unidad = $numero % 10;
        return $decenas[$decena] . ($unidad > 0 ? " y " . $unidades[$unidad] : "");
    }
}
```
