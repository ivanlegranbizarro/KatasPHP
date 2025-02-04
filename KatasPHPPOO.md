Aquí tienes 10 katas PHP orientadas a POO para pruebas de acceso Junior:

Kata Calculadora:
Crea una clase Calculadora con métodos para sumar, restar, multiplicar y dividir. Implementa manejo de errores para división por cero.
Kata Biblioteca:
Desarrolla clases Libro y Biblioteca. La clase Libro tendrá propiedades como título, autor y año. La clase Biblioteca permitirá añadir libros, eliminarlos y listar los disponibles.
Kata Empleados:
Implementa una jerarquía de clases de empleados con una clase base Empleado y clases derivadas Gerente y Desarrollador. Cada clase debe tener métodos para calcular salario y mostrar información.
Kata Formas Geométricas:
Crea una interfaz Forma con métodos para calcular área y perímetro. Implementa clases Circulo, Rectangulo y Triangulo que hereden de esta interfaz.
Kata Sistema Bancario:
Diseña clases Cuenta y Cliente. La clase Cuenta debe permitir depósitos, retiros y consulta de saldo. La clase Cliente tendrá múltiples cuentas.
Kata Tienda Online:
Desarrolla clases Producto, Carrito y Pedido. Implementa métodos para añadir productos, calcular total y procesar pedidos.
Kata Sistema de Reservas:
Crea clases Habitacion, Hotel y Reserva. Permite consultar disponibilidad, hacer reservas y cancelarlas.
Kata Estudiantes:
Implementa clases Estudiante y Curso. Los estudiantes pueden inscribirse en cursos, y los cursos pueden gestionar sus estudiantes.
Kata Vehículos:
Diseña una jerarquía de clases de vehículos con una clase base Vehiculo y clases derivadas como Coche, Moto y Camion. Implementa métodos para arrancar, acelerar y frenar.
Kata Sistema de Gestión de Animales:
Crea un sistema de gestión de animales con clases Animal, Perro, Gato y Granja. Implementa métodos para alimentar, hacer sonidos y contar animales.


## Soluciones
<?php
// Kata 1: Calculadora
class Calculadora {
    public function sumar($a, $b) {
        return $a + $b;
    }

    public function restar($a, $b) {
        return $a - $b;
    }

    public function multiplicar($a, $b) {
        return $a * $b;
    }

    public function dividir($a, $b) {
        if ($b == 0) {
            throw new InvalidArgumentException("No se puede dividir por cero");
        }
        return $a / $b;
    }
}

// Kata 2: Biblioteca
class Libro {
    private $titulo;
    private $autor;
    private $año;

    public function __construct($titulo, $autor, $año) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->año = $año;
    }

    public function getInformacion() {
        return "{$this->titulo} por {$this->autor} ({$this->año})";
    }
}

class Biblioteca {
    private $libros = [];

    public function añadirLibro(Libro $libro) {
        $this->libros[] = $libro;
    }

    public function eliminarLibro(Libro $libroAEliminar) {
        $this->libros = array_filter($this->libros, function($libro) use ($libroAEliminar) {
            return $libro !== $libroAEliminar;
        });
    }

    public function listarLibros() {
        return array_map(function($libro) {
            return $libro->getInformacion();
        }, $this->libros);
    }
}

// Kata 3: Empleados
abstract class Empleado {
    protected $nombre;
    protected $salarioBase;

    public function __construct($nombre, $salarioBase) {
        $this->nombre = $nombre;
        $this->salarioBase = $salarioBase;
    }

    abstract public function calcularSalario();

    public function getInformacion() {
        return "Nombre: {$this->nombre}, Salario: " . $this->calcularSalario();
    }
}

class Gerente extends Empleado {
    private $bono;

    public function __construct($nombre, $salarioBase, $bono) {
        parent::__construct($nombre, $salarioBase);
        $this->bono = $bono;
    }

    public function calcularSalario() {
        return $this->salarioBase + $this->bono;
    }
}

class Desarrollador extends Empleado {
    private $horasExtras;

    public function __construct($nombre, $salarioBase, $horasExtras) {
        parent::__construct($nombre, $salarioBase);
        $this->horasExtras = $horasExtras;
    }

    public function calcularSalario() {
        return $this->salarioBase + ($this->horasExtras * 20);
    }
}

// Kata 4: Formas Geométricas
interface Forma {
    public function calcularArea();
    public function calcularPerimetro();
}

class Circulo implements Forma {
    private $radio;

    public function __construct($radio) {
        $this->radio = $radio;
    }

    public function calcularArea() {
        return pi() * $this->radio * $this->radio;
    }

    public function calcularPerimetro() {
        return 2 * pi() * $this->radio;
    }
}

class Rectangulo implements Forma {
    private $largo;
    private $ancho;

    public function __construct($largo, $ancho) {
        $this->largo = $largo;
        $this->ancho = $ancho;
    }

    public function calcularArea() {
        return $this->largo * $this->ancho;
    }

    public function calcularPerimetro() {
        return 2 * ($this->largo + $this->ancho);
    }
}

// Kata 5: Sistema Bancario
class Cuenta {
    private $saldo;

    public function __construct($saldoInicial = 0) {
        $this->saldo = $saldoInicial;
    }

    public function depositar($cantidad) {
        $this->saldo += $cantidad;
    }

    public function retirar($cantidad) {
        if ($cantidad > $this->saldo) {
            throw new Exception("Saldo insuficiente");
        }
        $this->saldo -= $cantidad;
    }

    public function getSaldo() {
        return $this->saldo;
    }
}

class Cliente {
    private $nombre;
    private $cuentas = [];

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function añadirCuenta(Cuenta $cuenta) {
        $this->cuentas[] = $cuenta;
    }

    public function getCuentas() {
        return $this->cuentas;
    }
}

// Kata 6: Tienda Online
class Producto {
    private $nombre;
    private $precio;

    public function __construct($nombre, $precio) {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getNombre() {
        return $this->nombre;
    }
}

class Carrito {
    private $productos = [];

    public function añadirProducto(Producto $producto) {
        $this->productos[] = $producto;
    }

    public function calcularTotal() {
        return array_reduce($this->productos, function($total, $producto) {
            return $total + $producto->getPrecio();
        }, 0);
    }
}

class Pedido {
    private $carrito;
    private $estado = 'pendiente';

    public function __construct(Carrito $carrito) {
        $this->carrito = $carrito;
    }

    public function procesar() {
        $this->estado = 'procesado';
    }

    public function getTotal() {
        return $this->carrito->calcularTotal();
    }
}

// Kata 7: Sistema de Reservas
class Habitacion {
    private $numero;
    private $disponible = true;

    public function __construct($numero) {
        $this->numero = $numero;
    }

    public function estaDisponible() {
        return $this->disponible;
    }

    public function reservar() {
        $this->disponible = false;
    }

    public function liberar() {
        $this->disponible = true;
    }
}

class Hotel {
    private $habitaciones = [];

    public function añadirHabitacion(Habitacion $habitacion) {
        $this->habitaciones[] = $habitacion;
    }

    public function buscarHabitacionDisponible() {
        foreach ($this->habitaciones as $habitacion) {
            if ($habitacion->estaDisponible()) {
                return $habitacion;
            }
        }
        return null;
    }
}

class Reserva {
    private $habitacion;
    private $fechaInicio;
    private $fechaFin;

    public function __construct(Habitacion $habitacion, $fechaInicio, $fechaFin) {
        $this->habitacion = $habitacion;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
        $this->habitacion->reservar();
    }

    public function cancelar() {
        $this->habitacion->liberar();
    }
}

// Kata 8: Estudiantes
class Estudiante {
    private $nombre;
    private $cursos = [];

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function inscribirCurso(Curso $curso) {
        $this->cursos[] = $curso;
        $curso->añadirEstudiante($this);
    }

    public function getNombre() {
        return $this->nombre;
    }
}

class Curso {
    private $nombre;
    private $estudiantes = [];

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function añadirEstudiante(Estudiante $estudiante) {
        $this->estudiantes[] = $estudiante;
    }

    public function getEstudiantes() {
        return array_map(function($estudiante) {
            return $estudiante->getNombre();
        }, $this->estudiantes);
    }
}

// Kata 9: Vehículos
abstract class Vehiculo {
    protected $marca;
    protected $modelo;
    protected $encendido = false;

    public function __construct($marca, $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function arrancar() {
        $this->encendido = true;
    }

    public function apagar() {
        $this->encendido = false;
    }

    abstract public function acelerar();
}

class Coche extends Vehiculo {
    public function acelerar() {
        return "Acelerando coche";
    }
}

class Moto extends Vehiculo {
    public function acelerar() {
        return "Acelerando moto";
    }
}

// Kata 10: Sistema de Gestión de Animales
abstract class Animal {
    protected $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    abstract public function hacerSonido();
    abstract public function alimentar();
}

class Perro extends Animal {
    public function hacerSonido() {
        return "¡Guau!";
    }

    public function alimentar() {
        return "Alimentando perro";
    }
}

class Gato extends Animal {
    public function hacerSonido() {
        return "¡Miau!";
    }

    public function alimentar() {
        return "Alimentando gato";
    }
}

class Granja {
    private $animales = [];

    public function añadirAnimal(Animal $animal) {
        $this->animales[] = $animal;
    }

    public function contarAnimales() {
        return count($this->animales);
    }
}
?>
