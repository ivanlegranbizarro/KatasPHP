<?php

<!-- /**
 * ENUNCIADOS DE LAS KATAS
 * =======================
 *
 * 1. Clase Biblioteca
 * Crea una clase Biblioteca que gestione libros. Cada libro tiene título, autor y disponibilidad.
 * Implementa métodos para añadir libros, prestar, devolver y listar libros disponibles.
 *
 * 2. Rotación de Array
 * Escribe una función que rote un array n posiciones a la derecha.
 * Ejemplo: rotateArray([1,2,3,4,5], 2) => [4,5,1,2,3]
 *
 * 3. Validador de Contraseñas
 * Crea una clase ValidadorPassword que verifique si una contraseña cumple los criterios:
 * - Mínimo 8 caracteres
 * - Al menos una mayúscula
 * - Al menos un número
 * - Al menos un carácter especial
 *
 * 4. Contador de Palabras
 * Implementa una función que reciba un texto y devuelva un array asociativo con el conteo
 * de cada palabra, ignorando mayúsculas/minúsculas y signos de puntuación.
 *
 * 5. Clase Calculadora
 * Desarrolla una clase Calculadora que soporte operaciones básicas y mantenga un historial
 * de las últimas 5 operaciones realizadas.
 *
 * 6. Buscador de Duplicados
 * Escribe una función que encuentre todos los números que aparecen más de una vez en un array.
 *
 * 7. Clase Carrito de Compra
 * Implementa una clase CarritoCompra que permita añadir productos (nombre, precio, cantidad),
 * eliminar productos, calcular total y aplicar descuentos.
 *
 * 8. Convertidor de Tiempo
 * Crea una función que convierta un número de segundos en un string con formato "HH:MM:SS".
 *
 * 9. Validador de Paréntesis
 * Implementa una función que verifique si una cadena tiene sus paréntesis balanceados.
 * Ejemplo: "((()))" -> true, "(()" -> false
 *
 * 10. Clase Lista Enlazada
 * Crea una implementación simple de una lista enlazada con métodos para añadir, eliminar
 * y buscar elementos.
 *
 * SOLUCIONES
 * ==========
 */

// 1. Clase Biblioteca
class Biblioteca {
    private array $libros = [];

    public function agregarLibro(string $titulo, string $autor): void {
        $this->libros[] = [
            'titulo' => $titulo,
            'autor' => $autor,
            'disponible' => true
        ];
    }

    public function prestarLibro(string $titulo): bool {
        foreach ($this->libros as &$libro) {
            if ($libro['titulo'] === $titulo && $libro['disponible']) {
                $libro['disponible'] = false;
                return true;
            }
        }
        return false;
    }

    public function devolverLibro(string $titulo): bool {
        foreach ($this->libros as &$libro) {
            if ($libro['titulo'] === $titulo && !$libro['disponible']) {
                $libro['disponible'] = true;
                return true;
            }
        }
        return false;
    }

    public function listarDisponibles(): array {
        return array_filter($this->libros, fn($libro) => $libro['disponible']);
    }
}

// 2. Rotación de Array
function rotateArray(array $arr, int $n): array {
    $len = count($arr);
    $n = $n % $len; // Normalizamos la rotación

    // Slice and merge approach
    return array_merge(
        array_slice($arr, -$n),
        array_slice($arr, 0, $len - $n)
    );
}

// 3. Validador de Contraseñas
class ValidadorPassword {
    public function validar(string $password): bool {
        return strlen($password) >= 8 &&
               preg_match('/[A-Z]/', $password) &&
               preg_match('/[0-9]/', $password) &&
               preg_match('/[^A-Za-z0-9]/', $password);
    }
}

// 4. Contador de Palabras
function contarPalabras(string $texto): array {
    // Limpiamos el texto y lo convertimos a minúsculas
    $texto = strtolower($texto);
    $texto = preg_replace('/[^\w\s]/', '', $texto);

    // Dividimos en palabras y contamos
    $palabras = str_word_count($texto, 1);
    return array_count_values($palabras);
}

// 5. Clase Calculadora
class Calculadora {
    private array $historial = [];

    private function agregarAlHistorial(string $operacion, float $resultado): void {
        array_unshift($this->historial, ["$operacion = $resultado"]);
        if (count($this->historial) > 5) {
            array_pop($this->historial);
        }
    }

    public function sumar(float $a, float $b): float {
        $resultado = $a + $b;
        $this->agregarAlHistorial("$a + $b", $resultado);
        return $resultado;
    }

    public function restar(float $a, float $b): float {
        $resultado = $a - $b;
        $this->agregarAlHistorial("$a - $b", $resultado);
        return $resultado;
    }

    public function getHistorial(): array {
        return $this->historial;
    }
}

// 6. Buscador de Duplicados
function encontrarDuplicados(array $numeros): array {
    $conteo = array_count_values($numeros);
    return array_keys(array_filter($conteo, fn($count) => $count > 1));
}

// 7. Clase Carrito de Compra
class CarritoCompra {
    private array $productos = [];

    public function agregarProducto(string $nombre, float $precio, int $cantidad): void {
        $this->productos[] = [
            'nombre' => $nombre,
            'precio' => $precio,
            'cantidad' => $cantidad
        ];
    }

    public function eliminarProducto(string $nombre): void {
        $this->productos = array_filter(
            $this->productos,
            fn($p) => $p['nombre'] !== $nombre
        );
    }

    public function calcularTotal(float $descuento = 0): float {
        $total = array_reduce(
            $this->productos,
            fn($acc, $p) => $acc + ($p['precio'] * $p['cantidad']),
            0
        );
        return $total * (1 - $descuento/100);
    }
}

// 8. Convertidor de Tiempo
function segundosAHMS(int $segundos): string {
    $horas = floor($segundos / 3600);
    $minutos = floor(($segundos % 3600) / 60);
    $segs = $segundos % 60;

    return sprintf("%02d:%02d:%02d", $horas, $minutos, $segs);
}

// 9. Validador de Paréntesis
function validarParentesis(string $str): bool {
    $contador = 0;

    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] === '(') {
            $contador++;
        } elseif ($str[$i] === ')') {
            $contador--;
        }

        if ($contador < 0) return false;
    }

    return $contador === 0;
}

// 10. Clase Lista Enlazada
class Nodo {
    public $valor;
    public ?Nodo $siguiente;

    public function __construct($valor) {
        $this->valor = $valor;
        $this->siguiente = null;
    }
}

class ListaEnlazada {
    private ?Nodo $cabeza = null;

    public function agregar($valor): void {
        $nuevo = new Nodo($valor);
        if (!$this->cabeza) {
            $this->cabeza = $nuevo;
            return;
        }

        $actual = $this->cabeza;
        while ($actual->siguiente) {
            $actual = $actual->siguiente;
        }
        $actual->siguiente = $nuevo;
    }

    public function eliminar($valor): bool {
        if (!$this->cabeza) return false;

        if ($this->cabeza->valor === $valor) {
            $this->cabeza = $this->cabeza->siguiente;
            return true;
        }

        $actual = $this->cabeza;
        while ($actual->siguiente && $actual->siguiente->valor !== $valor) {
            $actual = $actual->siguiente;
        }

        if ($actual->siguiente) {
            $actual->siguiente = $actual->siguiente->siguiente;
            return true;
        }

        return false;
    }

    public function buscar($valor): bool {
        $actual = $this->cabeza;
        while ($actual) {
            if ($actual->valor === $valor) return true;
            $actual = $actual->siguiente;
        }
        return false;
    }
} -->
