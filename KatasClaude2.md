### 1. filtrar y transformar array de productos
**enunciado:** crea una función que reciba un array de productos (con nombre, precio y categoría) y devuelva solo los productos de una categoría específica, con un descuento del 10% aplicado.

### 2. Interfaz y Trait para Validación de Datos
**Enunciado:** Diseña una interfaz `Validatable` con un método `validate()`. Crea un trait `ValidationTrait` que implemente métodos genéricos de validación para diferentes tipos de datos (email, número de teléfono, etc.).

### 3. Ordenar y Agrupar Arrays
**Enunciado:** Escribe una función que reciba un array de estudiantes (con nombre, edad y nota) y devuelva un array agrupado por rango de notas: aprobados, notables y sobresalientes.

### 4. Gestión de Carrito de Compras con Interfaces
**Enunciado:** Implementa una interfaz `Purchasable` con métodos para calcular precio final, aplicar descuentos y validar disponibilidad. Crea clases de productos que implementen esta interfaz.

### 5. Manipulación de Arrays Multidimensionales
**Enunciado:** Desarrolla una función que reciba un array de transacciones bancarias y devuelva estadísticas: total de ingresos, total de gastos, balance neto y transacción más grande.

### 6. Trait de Logging Personalizado
**Enunciado:** Crea un trait `LoggableTrait` que añada métodos para registrar eventos en diferentes niveles (info, warning, error) con marca de tiempo y contexto.

### 7. Transformación Condicional de Arrays
**Enunciado:** Escribe una función que reciba un array de números y aplique transformaciones: números pares se multiplican por 2, impares se elevan al cuadrado.

### 8. Interfaz de Exportación de Datos
**Enunciado:** Define una interfaz `Exportable` con métodos para exportar datos en diferentes formatos (JSON, CSV, XML). Implementa la interfaz en diferentes clases de modelo.

### 9. Combinación y Agregación de Arrays
**Enunciado:** Desarrolla una función que combine múltiples arrays de empleados, eliminando duplicados y agregando información adicional como antiguedad y departamento.

### 10. Implementación de Estrategias de Filtrado
**Enunciado:** Crea una interfaz `FilterStrategy` con un método `filter()`. Implementa diferentes estrategias de filtrado para un array de productos (por precio, por categoría, por disponibilidad).

¿Quieres que genere las soluciones en PHP ahora?

### Soluciones
<?php
// 1. Filtrar y Transformar Array de Productos
interface ProductInterface {
    public function getName(): string;
    public function getPrice(): float;
    public function getCategory(): string;
}

class Product implements ProductInterface {
    private $name;
    private $price;
    private $category;

    public function __construct(string $name, float $price, string $category) {
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
    }

    public function getName(): string { return $this->name; }
    public function getPrice(): float { return $this->price; }
    public function getCategory(): string { return $this->category; }
}

function filterAndDiscountProducts(array $products, string $category): array {
    return array_map(function(ProductInterface $product) {
        return $product->getCategory() === $category
            ? new Product(
                $product->getName(),
                $product->getPrice() * 0.9,
                $product->getCategory()
            )
            : $product;
    }, $products);
}

// 2. Interfaz y Trait para Validación de Datos
interface Validatable {
    public function validate(): bool;
}

trait ValidationTrait {
    public function validateEmail(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function validatePhone(string $phone): bool {
        return preg_match('/^\+?[1-9]\d{1,14}$/', $phone) === 1;
    }
}

// 3. Ordenar y Agrupar Arrays
function groupStudentsByGrade(array $students): array {
    $grouped = [
        'aprobados' => [],
        'notables' => [],
        'sobresalientes' => []
    ];

    foreach ($students as $student) {
        if ($student['nota'] < 5) continue;
        if ($student['nota'] < 7) $grouped['aprobados'][] = $student;
        elseif ($student['nota'] < 9) $grouped['notables'][] = $student;
        else $grouped['sobresalientes'][] = $student;
    }

    return $grouped;
}

// 4. Interfaz Purchasable
interface Purchasable {
    public function getFinalPrice(): float;
    public function applyDiscount(float $percentage): void;
    public function isAvailable(): bool;
}

class ElectronicProduct implements Purchasable {
    private $price;
    private $stock;

    public function getFinalPrice(): float {
        return $this->price;
    }

    public function applyDiscount(float $percentage): void {
        $this->price *= (1 - $percentage);
    }

    public function isAvailable(): bool {
        return $this->stock > 0;
    }
}

// 5. Manipulación de Arrays Multidimensionales
function analyzeBankTransactions(array $transactions): array {
    $totalIncome = array_reduce($transactions, function($carry, $transaction) {
        return $carry + ($transaction['type'] === 'income' ? $transaction['amount'] : 0);
    }, 0);

    $totalExpenses = array_reduce($transactions, function($carry, $transaction) {
        return $carry + ($transaction['type'] === 'expense' ? $transaction['amount'] : 0);
    }, 0);

    $largestTransaction = max($transactions, fn($t) => $t['amount']);

    return [
        'total_income' => $totalIncome,
        'total_expenses' => $totalExpenses,
        'net_balance' => $totalIncome - $totalExpenses,
        'largest_transaction' => $largestTransaction
    ];
}

// 6. Trait de Logging Personalizado
trait LoggableTrait {
    private $logs = [];

    public function log(string $level, string $message, array $context = []): void {
        $this->logs[] = [
            'timestamp' => date('Y-m-d H:i:s'),
            'level' => $level,
            'message' => $message,
            'context' => $context
        ];
    }

    public function getLogs(): array {
        return $this->logs;
    }
}

// 7. Transformación Condicional de Arrays
function transformArray(array $numbers): array {
    return array_map(function($num) {
        return $num % 2 === 0 ? $num * 2 : $num ** 2;
    }, $numbers);
}

// 8. Interfaz de Exportación de Datos
interface Exportable {
    public function toJson(): string;
    public function toCsv(): string;
    public function toXml(): string;
}

// 9. Combinación y Agregación de Arrays
function mergeEmployeeArrays(array ...$employeeArrays): array {
    $merged = array_merge(...$employeeArrays);
    $unique = array_reduce($merged, function($carry, $employee) {
        $carry[$employee['id']] = $employee;
        return $carry;
    }, []);

    return array_values($unique);
}

// 10. Implementación de Estrategias de Filtrado
interface FilterStrategy {
    public function filter(array $products): array;
}

class PriceFilterStrategy implements FilterStrategy {
    private $maxPrice;

    public function __construct(float $maxPrice) {
        $this->maxPrice = $maxPrice;
    }

    public function filter(array $products): array {
        return array_filter($products, fn($p) => $p['price'] <= $this->maxPrice);
    }
}
