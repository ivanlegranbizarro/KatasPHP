# PHP Katas - Ejercicios de Práctica

## Introducción
Este documento contiene 10 ejercicios (katas) de PHP diseñados para desarrolladores junior. Los ejercicios cubren diferentes aspectos del lenguaje y tienen una dificultad progresiva de fácil a media.

## Ejercicios

### 1. Invertir Cadena
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
```

### 2. Contador de Vocales
Desarrolla una función que cuente la frecuencia de cada vocal en un texto.

**Requisitos:**
- Debe contar tanto vocales mayúsculas como minúsculas
- Debe devolver un array asociativo con el conteo de cada vocal
- Debe considerar vocales con acentos como la misma vocal sin acento

**Ejemplo:**
```php
contarVocales("hello") // Debe devolver ["a"=>0, "e"=>1, "i"=>0, "o"=>0, "u"=>0]
```

### 3. Validador de Contraseñas
Implementa un validador de contraseñas que verifique ciertos criterios de seguridad.

**Requisitos:**
- Mínimo 8 caracteres de longitud
- Al menos una letra mayúscula
- Al menos un número
- Al menos un carácter especial (!@#$%^&*)
- Devolver true si cumple todos los requisitos, false si no

**Ejemplo:**
```php
validarPassword("Abc123!") // Debe devolver false (muy corta)
validarPassword("Abcdef123!") // Debe devolver true
```

### 4. Calculadora de Descuentos
Crea una calculadora que aplique descuentos a precios según diferentes criterios.

**Requisitos:**
- Recibe precio base, porcentaje de descuento y tipo de cliente
- Si el cliente es "VIP", aplica 5% adicional después del primer descuento
- El precio final debe tener máximo 2 decimales
- Debe lanzar excepciones si el descuento es mayor al 100% o el precio es negativo

**Ejemplo:**
```php
calcularPrecioFinal(100, 20, "normal") // Debe devolver 80.00
calcularPrecioFinal(100, 20, "VIP") // Debe devolver 76.00
```

### 5. Formatear Array de Usuarios
Desarrolla una función que formatee un array de usuarios en un formato específico.

**Requisitos:**
- Recibe array de usuarios con nombre y edad
- Devuelve array con strings formateados
- Cada elemento debe tener el formato "Nombre (XX años)"

**Ejemplo:**
```php
$usuarios = [
["nombre" => "Juan", "edad" => 25],
["nombre" => "Ana", "edad" => 30]
];
formatearUsuarios($usuarios) // Debe devolver ["Juan (25 años)", "Ana (30 años)"]
```

### 6. Generador de Slugs
Crea un generador de slugs para URLs amigables.

**Requisitos:**
- Convertir texto a minúsculas
- Reemplazar espacios por guiones
- Eliminar acentos y caracteres especiales
- Solo permitir letras, números y guiones

**Ejemplo:**
```php
generarSlug("Hola Mundo PHP!") // Debe devolver "hola-mundo-php"
generarSlug("¿Qué tal está?") // Debe devolver "que-tal-esta"
```

### 7. Filtrar Array de Productos
Implementa un filtro de productos según criterios específicos.

**Requisitos:**
- Filtrar por rango de precio (mínimo y máximo)
- Filtrar por categoría (opcional)
- Devolver array con productos que cumplen los criterios
- Manejar caso de no encontrar productos

**Ejemplo:**
```php
$productos = [
["nombre" => "Laptop", "precio" => 800, "categoria" => "Electrónica"],
["nombre" => "Mouse", "precio" => 20, "categoria" => "Electrónica"],
["nombre" => "Libro", "precio" => 15, "categoria" => "Libros"]
];
filtrarProductos($productos, 0, 50, "Electrónica") // Debe devolver array con el Mouse
```

### 8. Validador de DNI Español
Desarrolla un validador para DNIs españoles.

**Requisitos:**
- Validar formato (8 números + 1 letra)
- Comprobar que la letra corresponde según el algoritmo oficial
- Devolver true/false según validez
- Manejar diferentes formatos de entrada (con/sin espacios, guiones, etc.)

**Ejemplo:**
```php
validarDNI("12345678Z") // Debe devolver true/false según corresponda
validarDNI("1234-5678-Z") // Debe procesar el formato y validar
```

### 9. Calculadora de Fechas Laborables
Crea una función que calcule días laborables entre dos fechas.

**Requisitos:**
- Recibir dos fechas en formato Y-m-d
- Calcular días laborables (excluir sábados y domingos)
- Manejar excepciones para fechas inválidas
- La fecha inicial debe ser menor o igual a la fecha final

**Ejemplo:**
```php
diasEntreFechas("2024-01-01", "2024-01-07") // Debe devolver 5 (sin contar sábado y domingo)
```

### 10. Analizador de Texto
Implementa un analizador que extraiga estadísticas de un texto.

**Requisitos:**
- Contar número total de palabras
- Identificar palabra más larga
- Contar número de oraciones
- Calcular frecuencia de cada palabra
- Ignorar mayúsculas/minúsculas para el conteo

**Ejemplo:**
```php
$stats = analizarTexto("Hola mundo. Este es un texto de ejemplo. Hola de nuevo.");
// Debe devolver array con estadísticas completas
```

## Soluciones

### 1. Invertir Cadena
```php
function invertirCadena($str) {
$longitud = strlen($str);
$invertida = '';
for ($i = $longitud - 1; $i >= 0; $i--) {
$invertida .= $str[$i];
}
return $invertida;
}
```

### 2. Contador de Vocales
```php
function contarVocales($texto) {
$texto = strtolower($texto);
$vocales = ['a' => 0, 'e' => 0, 'i' => 0, 'o' => 0, 'u' => 0];
$texto = preg_replace('/[áàäâ]/u', 'a', $texto);
$texto = preg_replace('/[éèëê]/u', 'e', $texto);
$texto = preg_replace('/[íìïî]/u', 'i', $texto);
$texto = preg_replace('/[óòöô]/u', 'o', $texto);
$texto = preg_replace('/[úùüû]/u', 'u', $texto);

for ($i = 0; $i < strlen($texto); $i++) {
    if (isset($vocales[$texto[$i]])) {
    $vocales[$texto[$i]]++;
    }
    }
    return $vocales;
    }
    ```

    ### 3. Validador de Contraseñas
    ```php
    function validarPassword($password) {
    if (strlen($password) < 8) {
    return false;
    }

    if (!preg_match('/[A-Z]/', $password)) {
    return false;
    }

    if (!preg_match('/[0-9]/', $password)) {
    return false;
    }

    if (!preg_match('/[!@#$%^&*]/', $password)) {
    return false;
    }

    return true;
    }
    ```

    ### 4. Calculadora de Descuentos
    ```php
    function calcularPrecioFinal($precio, $descuento, $tipoCliente) {
    if ($precio < 0 || $descuento> 100) {
    throw new Exception("Precio o descuento inválido");
    }

    $precioConDescuento = $precio * (1 - $descuento/100);

    if ($tipoCliente === "VIP") {
    $precioConDescuento *= 0.95; // 5% adicional
    }

    return round($precioConDescuento, 2);
    }
    ```

    ### 5. Formatear Array de Usuarios
    ```php
    function formatearUsuarios($usuarios) {
    return array_map(function($usuario) {
    return $usuario['nombre'] . " (" . $usuario['edad'] . " años)";
    }, $usuarios);
    }
    ```

    ### 6. Generador de Slugs
    ```php
    function generarSlug($titulo) {
    // Convertir a minúsculas y eliminar acentos
    $titulo = strtolower($titulo);
    $titulo = preg_replace('/[áàäâ]/u', 'a', $titulo);
    $titulo = preg_replace('/[éèëê]/u', 'e', $titulo);
    $titulo = preg_replace('/[íìïî]/u', 'i', $titulo);
    $titulo = preg_replace('/[óòöô]/u', 'o', $titulo);
    $titulo = preg_replace('/[úùüû]/u', 'u', $titulo);

    // Reemplazar caracteres especiales por guiones
    $titulo = preg_replace('/[^a-z0-9-]/', '-', $titulo);

    // Eliminar guiones múltiples
    $titulo = preg_replace('/-+/', '-', $titulo);

    // Eliminar guiones al inicio y final
    return trim($titulo, '-');
    }
    ```

    ### 7. Filtrar Array de Productos
    ```php
    function filtrarProductos($productos, $precioMin, $precioMax, $categoria = null) {
    return array_filter($productos, function($producto) use ($precioMin, $precioMax, $categoria) {
    $cumplePrecio = $producto['precio'] >= $precioMin && $producto['precio'] <= $precioMax;

        if ($categoria===null) {
        return $cumplePrecio;
        }

        return $cumplePrecio && $producto['categoria']===$categoria;
        });
        }
        ```

        ### 8. Validador de DNI
        ```php
        function validarDNI($dni) {
        // Limpiar el DNI de espacios y guiones
        $dni=preg_replace('/[^0-9A-Z]/i', '' , $dni);

        // Verificar formato básico
        if (!preg_match('/^[0-9]{8}[A-Z]$/i', $dni)) {
        return false;
        }

        // Extraer número y letra
        $numero=substr($dni, 0, 8);
        $letra=strtoupper(substr($dni, 8, 1));

        // Letras válidas en orden
        $letras="TRWAGMYFPDXBNJZSQVHLCKE" ;

        // Calcular letra esperada
        $letraEsperada=$letras[$numero % 23];

        return $letra===$letraEsperada;
        }
        ```

        ### 9. Calculadora de Fechas Laborables
        ```php
        function diasEntreFechas($fecha1, $fecha2) {
        try {
        $inicio=new DateTime($fecha1);
        $fin=new DateTime($fecha2);

        if ($inicio> $fin) {
        throw new Exception("La fecha inicial debe ser menor o igual a la final");
        }

        $diasLaborables = 0;
        $interval = new DateInterval('P1D');
        $periodo = new DatePeriod($inicio, $interval, $fin);

        foreach ($periodo as $fecha) {
        $diaSemana = $fecha->format('N');
        if ($diaSemana < 6) { // 1 (lunes) a 5 (viernes)
            $diasLaborables++;
            }
            }

            return $diasLaborables;

            } catch (Exception $e) {
            throw new Exception("Error en las fechas: " . $e->getMessage());
    }
}
```

### 10. Analizador de Texto
```php
function analizarTexto($texto) {
    // Preparar el texto
    $texto = trim($texto);

    // Contar oraciones
    $numOraciones = preg_match_all('/[.!?]+/', $texto);

    // Preparar palabras
    $palabras = preg_split('/\s+/', $texto);
    $palabras = array_filter($palabras); // Eliminar elementos vacíos

    // Encontrar palabra más larga
    $palabraLarga = '';
    $frecuencia = array();

    foreach ($palabras as $palabra) {
        $palabraLimpia = strtolower(preg_replace('/[^a-zA-ZáéíóúÁÉÍÓÚ]/u', '', $palabra));

        if (strlen($palabraLimpia) > strlen($palabraLarga)) {
            $palabraLarga = $palabraLimpia;
        }

        if (!empty($palabraLimpia)) {
            $frecuencia[$palabraLimpia] = isset($frecuencia[$palabraLimpia]) ?
                                        $frecuencia[$palabraLimpia] + 1 : 1;
        }
    }

    return [
        'num_palabras' => count($palabras),
        'palabra_mas_larga' => $palabraLarga,
        'num_oraciones' => $numOraciones,
        'frecuencia_palabras' => $frecuencia
    ];
}
```

---

## Notas Finales
- Estas soluciones son ejemplos y pueden optimizarse de múltiples formas
- Se recomienda escribir tests unitarios para cada función
- Considera el manejo de casos edge y excepciones
- Explora la documentación de PHP para encontrar funciones útiles que puedan mejorar las soluciones
