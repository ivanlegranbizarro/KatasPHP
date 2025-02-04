¡Claro! Aquí tienes 10 katas un poco más desafiantes que te ayudarán a prepararte para entrevistas de PHP. Estos ejercicios cubren temas como manipulación de arrays, funciones avanzadas, manejo de archivos, y más. Primero los enunciados y luego las soluciones.

---

### Enunciados

1. **Encontrar el segundo número más grande en un array**:
   Escribe una función que encuentre el segundo número más grande en un array de números.

2. **Comprobar si dos strings son anagramas**:
   Escribe una función que determine si dos cadenas son anagramas (contienen los mismos caracteres en diferente orden).

3. **Contar la frecuencia de elementos en un array**:
   Escribe una función que cuente la frecuencia de cada elemento en un array y devuelva un array asociativo con los resultados.

4. **Encontrar la intersección de dos arrays**:
   Escribe una función que devuelva un array con los elementos comunes entre dos arrays.

5. **Validar un correo electrónico**:
   Escribe una función que valide si una cadena es un correo electrónico válido.

6. **Leer un archivo y contar las líneas**:
   Escribe una función que lea un archivo de texto y devuelva el número de líneas que contiene.

7. **Eliminar duplicados de un array**:
   Escribe una función que elimine los elementos duplicados de un array.

8. **Encontrar la subcadena más larga sin caracteres repetidos**:
   Escribe una función que encuentre la subcadena más larga en una cadena sin caracteres repetidos.

9. **Generar un array de números primos hasta un límite**:
   Escribe una función que genere un array con todos los números primos hasta un número dado.

10. **Convertir un array asociativo a JSON**:
    Escribe una función que convierta un array asociativo en una cadena JSON.

---

### Soluciones

1. **Encontrar el segundo número más grande en un array**:
   ```php
   function segundoMasGrande($arr) {
       rsort($arr);
       return $arr[1];
   }
   ```

2. **Comprobar si dos strings son anagramas**:
   ```php
   function sonAnagramas($str1, $str2) {
       return count_chars($str1, 1) === count_chars($str2, 1);
   }
   ```

3. **Contar la frecuencia de elementos en un array**:
   ```php
   function contarFrecuencia($arr) {
       return array_count_values($arr);
   }
   ```

4. **Encontrar la intersección de dos arrays**:
   ```php
   function interseccion($arr1, $arr2) {
       return array_intersect($arr1, $arr2);
   }
   ```

5. **Validar un correo electrónico**:
   ```php
   function validarEmail($email) {
       return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
   }
   ```

6. **Leer un archivo y contar las líneas**:
   ```php
   function contarLineas($archivo) {
       $lineas = file($archivo);
       return count($lineas);
   }
   ```

7. **Eliminar duplicados de un array**:
   ```php
   function eliminarDuplicados($arr) {
       return array_unique($arr);
   }
   ```

8. **Encontrar la subcadena más larga sin caracteres repetidos**:
   ```php
   function subcadenaMasLarga($s) {
       $n = strlen($s);
       $maxLength = 0;
       $start = 0;
       $charMap = [];

       for ($end = 0; $end < $n; $end++) {
           $currentChar = $s[$end];
           if (array_key_exists($currentChar, $charMap)) {
               $start = max($start, $charMap[$currentChar] + 1);
           }
           $charMap[$currentChar] = $end;
           $maxLength = max($maxLength, $end - $start + 1);
       }

       return $maxLength;
   }
   ```

9. **Generar un array de números primos hasta un límite**:
   ```php
   function generarPrimos($limite) {
       $primos = [];
       for ($i = 2; $i <= $limite; $i++) {
           if (esPrimo($i)) {
               $primos[] = $i;
           }
       }
       return $primos;
   }

   function esPrimo($n) {
       if ($n <= 1) {
           return false;
       }
       for ($i = 2; $i <= sqrt($n); $i++) {
           if ($n % $i === 0) {
               return false;
           }
       }
       return true;
   }
   ```

10. **Convertir un array asociativo a JSON**:
    ```php
    function arrayAJson($arr) {
        return json_encode($arr);
    }
    ```

---

Estos ejercicios son un poco más avanzados y te ayudarán a practicar conceptos clave que suelen aparecer en entrevistas técnicas. Si tienes alguna duda o necesitas más explicaciones, ¡no dudes en preguntar! 😊
