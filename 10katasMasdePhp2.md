# Katas de PHP Simplificadas - Nivel Junior-Intermedio

## Enunciados

### 1. Generador de Slugs
Crea una función que convierta un título en un slug para URLs. Solo debe manejar letras, números y espacios, convirtiendo espacios en guiones y todo a minúsculas.
Ejemplo: "Hola Mundo PHP" → "hola-mundo-php"

### 2. Calculadora de Días
Implementa una función que calcule el número de días laborables (lunes a viernes) entre dos fechas.

### 3. Validador de JSON
Escribe una función que verifique si una cadena es un JSON válido y contenga un campo 'name' y 'email'.

### 4. Análisis de Texto
Crea una función que analice un texto y devuelva: número de palabras y palabra más larga.

### 5. Compresión de Arrays
Implementa una función que "comprima" un array de números consecutivos en rangos.
Ejemplo: [1,2,3,6,7,8] → ["1-3","6-8"]

### 6. Validador de Tarjetas
Escribe una función que valide si un número de tarjeta tiene el formato correcto (16 dígitos) y comienza con 4 (Visa) o 5 (Mastercard).

### 7. Parseador de CSV
Crea una función que convierta un string CSV simple (sin campos entrecomillados) en un array de objetos.

### 8. Calculadora Simple
Implementa una función que evalúe operaciones matemáticas básicas (+, -, *, /) sin paréntesis.
Ejemplo: "3 + 4 * 2" → 11

### 9. Formateador de Números
Escribe una función que formatee números para mostrar miles con punto y decimales con coma.
Ejemplo: 1234.56 → "1.234,56"

### 10. Mini-Query Builder
Crea una clase mínima para construir consultas SELECT con WHERE:
```php
$query->select('nombre')
      ->from('usuarios')
      ->where('edad', '>', 18);
```

## Ejemplo de Implementación Simplificada

```php
// Ejemplo de la kata 1: Generador de Slugs simplificado
function generarSlug($titulo) {
    // Convertir a minúsculas
    $slug = strtolower($titulo);
    // Reemplazar espacios por guiones
    $slug = str_replace(' ', '-', $slug);
    // Eliminar caracteres no alfanuméricos
    $slug = preg_replace('/[^a-z0-9-]/', '', $slug);
    // Eliminar guiones múltiples
    return preg_replace('/-+/', '-', $slug);
}

// Ejemplo de la kata 2: Calculadora de Días simplificada
function diasLaborables($fechaInicio, $fechaFin) {
    $inicio = new DateTime($fechaInicio);
    $fin = new DateTime($fechaFin);
    $diasLaborables = 0;

    while ($inicio <= $fin) {
        if ($inicio->format('N') <= 5) {
            $diasLaborables++;
        }
        $inicio->modify('+1 day');
    }

    return $diasLaborables;
}
```

Cada kata ahora:
- Se centra en un único concepto principal
- Reduce el número de casos especiales
- Mantiene la esencia del aprendizaje
- Requiere menos código para la solución
- Es más fácil de testear

Aun así, siguen siendo útiles para practicar conceptos importantes de PHP.
