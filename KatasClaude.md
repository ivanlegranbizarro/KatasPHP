## Katas y Soluciones

### 1. Eliminar duplicados de un array
**Enunciado:** Escribe una función que elimine los elementos duplicados de un array, manteniendo el orden original de los elementos.

### 2. Contar ocurrencias en un array
**Enunciado:** Escribe una función que reciba un array y devuelva un objeto donde las claves sean los elementos del array y los valores el número de veces que aparecen.

### 3. Rotar un array
**Enunciado:** Escribe una función que rote los elementos de un array k posiciones a la derecha. Por ejemplo, con k=2, [1,2,3,4,5] se convierte en [4,5,1,2,3].

### 4. Validar formato de email
**Enunciado:** Escribe una función que valide si una cadena tiene formato de email válido (debe contener un '@', al menos un punto después del '@', y caracteres válidos).

### 5. Encontrar el par que suma
**Enunciado:** Escribe una función que, dado un array de números y un valor objetivo, encuentre el primer par de números del array que sumen el valor objetivo.

### 6. Capitalizar palabras
**Enunciado:** Escribe una función que reciba una frase y devuelva la misma frase con la primera letra de cada palabra en mayúscula.

### 7. Comprimir cadena
**Enunciado:** Escribe una función que comprima una cadena contando las repeticiones consecutivas de cada carácter. Por ejemplo: "AABBBCCCC" → "A2B3C4".

### 8. Equilibrar paréntesis
**Enunciado:** Escribe una función que determine si una cadena de paréntesis está bien equilibrada. Por ejemplo: "(())" es válida, "(()" no lo es.

### 9. FizzBuzz mejorado
**Enunciado:** Implementa FizzBuzz pero permitiendo configurar los números y palabras. La función debe aceptar un objeto de configuración como {3: "Fizz", 5: "Buzz", 7: "Bazz"}.

### 10. Aplanar array
**Enunciado:** Escribe una función que aplane un array de múltiples niveles en uno de un solo nivel. Por ejemplo: [1,[2,[3,4]],5] → [1,2,3,4,5].

---

## Soluciones

### 1. Eliminar duplicados
```javascript
function eliminarDuplicados(arr) {
    return [...new Set(arr)];
    // Alternativa manual:
    // return arr.filter((item, index) => arr.indexOf(item) === index);
}
```
**Explicación:** Utilizamos Set para crear una colección de valores únicos y luego la convertimos de nuevo a array. La alternativa manual usa filter para mantener solo la primera ocurrencia de cada elemento.

### 2. Contar ocurrencias
```javascript
function contarOcurrencias(arr) {
    return arr.reduce((acc, curr) => {
        acc[curr] = (acc[curr] || 0) + 1;
        return acc;
    }, {});
}
```
**Explicación:** Utilizamos reduce para construir un objeto, donde cada elemento del array se convierte en una clave y su valor es el contador de apariciones.

### 3. Rotar array
```javascript
function rotarArray(arr, k) {
    k = k % arr.length; // Manejar cuando k > length
    return [...arr.slice(-k), ...arr.slice(0, -k)];
}
```
**Explicación:** Dividimos el array en dos partes usando slice y las recomponemos en el orden correcto. El módulo (%) maneja casos donde k es mayor que la longitud del array.

### 4. Validar email
```javascript
function validarEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}
```
**Explicación:** Utilizamos una expresión regular simple pero efectiva que verifica: caracteres antes del @, el @ mismo, caracteres después, y al menos un punto después del @.

### 5. Encontrar par que suma
```javascript
function encontrarParSuma(arr, objetivo) {
    const visto = new Set();
    for (const num of arr) {
        const complemento = objetivo - num;
        if (visto.has(complemento)) {
            return [complemento, num];
        }
        visto.add(num);
    }
    return null;
}
```
**Explicación:** Usamos un Set para almacenar los números ya vistos. Para cada número, calculamos su complemento (el número que necesitamos para llegar al objetivo) y verificamos si ya lo hemos visto.

### 6. Capitalizar palabras
```javascript
function capitalizarPalabras(frase) {
    return frase
        .split(' ')
        .map(palabra => palabra.charAt(0).toUpperCase() + palabra.slice(1))
        .join(' ');
}
```
**Explicación:** Dividimos la frase en palabras, transformamos cada palabra capitalizando su primera letra y manteniendo el resto igual, y luego unimos todo de nuevo.

### 7. Comprimir cadena
```javascript
function comprimirCadena(str) {
    let resultado = '';
    let count = 1;
    for (let i = 0; i < str.length; i++) {
        if (str[i] === str[i + 1]) {
            count++;
        } else {
            resultado += str[i] + (count > 1 ? count : '');
            count = 1;
        }
    }
    return resultado;
}
```
**Explicación:** Recorremos la cadena contando caracteres consecutivos iguales. Solo añadimos el número si hay más de una repetición.

### 8. Equilibrar paréntesis
```javascript
function equilibrarParentesis(str) {
    let contador = 0;
    for (const char of str) {
        if (char === '(') contador++;
        if (char === ')') contador--;
        if (contador < 0) return false;
    }
    return contador === 0;
}
```
**Explicación:** Mantenemos un contador que aumenta con '(' y disminuye con ')'. Si en algún momento es negativo o no termina en 0, la cadena no está equilibrada.

### 9. FizzBuzz mejorado
```javascript
function fizzBuzzMejorado(n, config) {
    return Array.from({length: n}, (_, i) => {
        const num = i + 1;
        let resultado = '';
        for (const [divisor, palabra] of Object.entries(config)) {
            if (num % parseInt(divisor) === 0) resultado += palabra;
        }
        return resultado || num.toString();
    });
}
```
**Explicación:** Generamos un array de n números y para cada uno verificamos todos los divisores configurados, concatenando las palabras correspondientes.

### 10. Aplanar array
```javascript
function aplanarArray(arr) {
    return arr.reduce((flat, item) =>
        flat.concat(Array.isArray(item) ? aplanarArray(item) : item),
    []);
}
```
**Explicación:** Usamos recursión con reduce para procesar cada elemento. Si el elemento es un array, lo aplanamos recursivamente; si no, lo concatenamos directamente.
