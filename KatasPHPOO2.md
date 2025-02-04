Aquí tienes 10 katas de PHP centrados en Programación Orientada a Objetos (POO) de dificultad moderada:

1. Sistema de Gestión de Biblioteca
Crea un sistema de gestión de biblioteca con clases para Libro, Autor y Biblioteca. Los libros deben poder prestarse, devolverse y tener un seguimiento de su estado (disponible/prestado). Implementa métodos para:
- Añadir libros
- Prestar un libro
- Devolver un libro
- Buscar libros por autor o título
- Mantener un registro de préstamos

2. Simulador de Sistema Bancario
Desarrolla un sistema bancario con clases para Cuenta, Cliente y Banco. Funcionalidades:
- Crear diferentes tipos de cuentas (corriente, ahorro)
- Realizar transferencias entre cuentas
- Aplicar comisiones y tipos de interés
- Implementar restricciones de saldo mínimo
- Generar extractos bancarios

3. Gestor de Tareas con Prioridades
Diseña un sistema de gestión de tareas con:
- Clase Tarea con propiedades como título, descripción, prioridad, estado
- Métodos para crear, modificar y eliminar tareas
- Filtrado de tareas por prioridad o estado
- Capacidad de agrupar tareas
- Sistema de notificaciones para tareas próximas a vencer

4. Juego de Estrategia con Unidades
Crea un sistema de juego de estrategia con:
- Clases abstractas para Unidad con subclases (Arquero, Caballero, Mago)
- Métodos de ataque y defensa diferenciados
- Sistema de experiencia y mejora de unidades
- Gestión de ejército con límites de unidades
- Mecánica de combate con cálculo de daño

5. Sistema de Reservas de Hotel
Implementa un sistema de reservas hoteleras con:
- Clases para Habitación, Cliente, Reserva
- Diferentes tipos de habitaciones con precios variables
- Gestión de disponibilidad
- Cálculo de precio total
- Manejo de descuentos y temporadas

6. Plataforma de Comercio Electrónico
Desarrolla un sistema de e-commerce con:
- Clases para Producto, Carrito, Pedido
- Gestión de inventario
- Aplicación de descuentos
- Cálculo de impuestos
- Sistema de pago con múltiples métodos

7. Gestor de Empleados y Nóminas
Crea un sistema de recursos humanos con:
- Clases para Empleado, Departamento, Nómina
- Cálculo de salarios con bonificaciones
- Seguimiento de vacaciones
- Registro de evaluaciones de desempeño
- Promociones y ascensos

8. Sistema de Seguimiento de Envíos
Diseña una aplicación de logística con:
- Clases para Paquete, Envío, Transportista
- Seguimiento de estado de envío
- Cálculo de tarifas según distancia y peso
- Gestión de rutas
- Notificaciones de estado

9. Aplicación de Streaming de Música
Implementa un sistema de reproducción musical con:
- Clases para Canción, Playlist, Usuario
- Gestión de biblioteca musical
- Reproducción y control de música
- Recomendaciones basadas en historial
- Gestión de derechos y suscripciones

10. Sistema de Reserva de Vuelos
Desarrolla una plataforma de reserva de vuelos con:
- Clases para Vuelo, Pasajero, Reserva
- Gestión de asientos
- Cálculo de precios según temporada
- Políticas de cancelación
- Sistema de check-in

¿Quieres que genere las soluciones para estos katas?


# Katas de PHP - Programación Orientada a Objetos

## 1. Sistema de Gestión de Biblioteca

```php
<?php
class Autor {
    private $nombre;
    private $nacionalidad;

    public function __construct($nombre, $nacionalidad) {
        $this->nombre = $nombre;
        $this->nacionalidad = $nacionalidad;
    }

    public function getNombre() {
        return $this->nombre;
    }
}

class Libro {
    private $titulo;
    private $autor;
    private $estado = 'disponible';

    public function __construct($titulo, Autor $autor) {
        $this->titulo = $titulo;
        $this->autor = $autor;
    }

    public function prestar() {
        if ($this->estado === 'disponible') {
            $this->estado = 'prestado';
            return true;
        }
        return false;
    }

    public function devolver() {
        $this->estado = 'disponible';
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutor() {
        return $this->autor;
    }
}

class Biblioteca {
    private $libros = [];
    private $prestamos = [];

    public function agregarLibro(Libro $libro) {
        $this->libros[] = $libro;
    }

    public function buscarPorAutor($nombreAutor) {
        return array_filter($this->libros, function($libro) use ($nombreAutor) {
            return $libro->getAutor()->getNombre() === $nombreAutor;
        });
    }

    public function buscarPorTitulo($titulo) {
        return array_filter($this->libros, function($libro) use ($titulo) {
            return $libro->getTitulo() === $titulo;
        });
    }

    public function prestarLibro(Libro $libro) {
        if ($libro->prestar()) {
            $this->prestamos[] = $libro;
            return true;
        }
        return false;
    }

    public function devolverLibro(Libro $libro) {
        $libro->devolver();
        $this->prestamos = array_filter($this->prestamos, function($prestado) use ($libro) {
            return $prestado !== $libro;
        });
    }
}
```

## 2. Simulador de Sistema Bancario

```php
<?php
abstract class Cuenta {
    protected $saldo;
    protected $cliente;

    public function __construct(Cliente $cliente, $saldoInicial = 0) {
        $this->cliente = $cliente;
        $this->saldo = $saldoInicial;
    }

    abstract public function aplicarIntereses();

    public function depositar($monto) {
        $this->saldo += $monto;
    }

    public function retirar($monto) {
        if ($this->saldo >= $monto) {
            $this->saldo -= $monto;
            return true;
        }
        return false;
    }

    public function getSaldo() {
        return $this->saldo;
    }
}

class CuentaCorriente extends Cuenta {
    private $comision = 10;

    public function aplicarIntereses() {
        // Sin intereses
    }

    public function retirar($monto) {
        $montoConComision = $monto + $this->comision;
        return parent::retirar($montoConComision);
    }
}

class CuentaAhorro extends Cuenta {
    private $tasaInteres = 0.05;

    public function aplicarIntereses() {
        $this->saldo += $this->saldo * $this->tasaInteres;
    }
}

class Cliente {
    private $nombre;
    private $cuentas = [];

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function agregarCuenta(Cuenta $cuenta) {
        $this->cuentas[] = $cuenta;
    }

    public function transferir(Cuenta $origen, Cuenta $destino, $monto) {
        if ($origen->retirar($monto)) {
            $destino->depositar($monto);
            return true;
        }
        return false;
    }
}

class Banco {
    private $clientes = [];

    public function registrarCliente(Cliente $cliente) {
        $this->clientes[] = $cliente;
    }

    public function aplicarInteresesGenerales() {
        foreach ($this->clientes as $cliente) {
            // Lógica para aplicar intereses en todas las cuentas
        }
    }
}
```

## 3. Gestor de Tareas con Prioridades

```php
<?php
class Tarea {
    private $titulo;
    private $descripcion;
    private $prioridad;
    private $estado;
    private $fechaVencimiento;

    public function __construct($titulo, $descripcion, $prioridad, $fechaVencimiento) {
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->prioridad = $prioridad;
        $this->estado = 'pendiente';
        $this->fechaVencimiento = $fechaVencimiento;
    }

    public function modificarEstado($nuevoEstado) {
        $this->estado = $nuevoEstado;
    }

    public function getPrioridad() {
        return $this->prioridad;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getFechaVencimiento() {
        return $this->fechaVencimiento;
    }
}

class GestorTareas {
    private $tareas = [];

    public function agregarTarea(Tarea $tarea) {
        $this->tareas[] = $tarea;
    }

    public function eliminarTarea(Tarea $tarea) {
        $this->tareas = array_filter($this->tareas, function($t) use ($tarea) {
            return $t !== $tarea;
        });
    }

    public function filtrarPorPrioridad($prioridad) {
        return array_filter($this->tareas, function($tarea) use ($prioridad) {
            return $tarea->getPrioridad() === $prioridad;
        });
    }

    public function filtrarPorEstado($estado) {
        return array_filter($this->tareas, function($tarea) use ($estado) {
            return $tarea->getEstado() === $estado;
        });
    }

    public function notificarTareasPorVencer() {
        $hoy = new DateTime();
        return array_filter($this->tareas, function($tarea) use ($hoy) {
            $fechaVencimiento = new DateTime($tarea->getFechaVencimiento());
            $diferencia = $hoy->diff($fechaVencimiento);
            return $diferencia->days <= 3;
        });
    }
}
```

## 4. Juego de Estrategia con Unidades

```php
<?php
abstract class Unidad {
    protected $nombre;
    protected $vida;
    protected $ataque;
    protected $defensa;
    protected $experiencia = 0;

    public function __construct($nombre, $vida, $ataque, $defensa) {
        $this->nombre = $nombre;
        $this->vida = $vida;
        $this->ataque = $ataque;
        $this->defensa = $defensa;
    }

    abstract public function habilidadEspecial();

    public function atacar(Unidad $objetivo) {
        $daño = max(0, $this->ataque - $objetivo->defensa);
        $objetivo->recibirDaño($daño);
        $this->ganarExperiencia();
    }

    protected function recibirDaño($daño) {
        $this->vida = max(0, $this->vida - $daño);
    }

    protected function ganarExperiencia() {
        $this->experiencia += 10;
        if ($this->experiencia >= 100) {
            $this->mejorar();
        }
    }

    protected function mejorar() {
        $this->ataque += 5;
        $this->defensa += 3;
        $this->experiencia = 0;
    }
}

class Arquero extends Unidad {
    public function habilidadEspecial() {
        return "Disparo múltiple";
    }
}

class Caballero extends Unidad {
    public function habilidadEspecial() {
        return "Carga de caballería";
    }
}

class Mago extends Unidad {
    public function habilidadEspecial() {
        return "Hechizo de área";
    }
}

class Ejercito {
    private $unidades = [];

    public function agregarUnidad(Unidad $unidad) {
        if (count($this->unidades) < 10) {
            $this->unidades[] = $unidad;
        }
    }

    public function batallar(Ejercito $ejercitoEnemigo) {
        // Lógica de combate entre ejércitos
    }
}
```

## 5. Sistema de Reservas de Hotel

```php
<?php
class Habitacion {
    private $numero;
    private $tipo;
    private $precio;
    private $disponible = true;

    public function __construct($numero, $tipo, $precio) {
        $this->numero = $numero;
        $this->tipo = $tipo;
        $this->precio = $precio;
    }

    public function reservar() {
        if ($this->disponible) {
            $this->disponible = false;
            return true;
        }
        return false;
    }

    public function liberar() {
        $this->disponible = true;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getDisponibilidad() {
        return $this->disponible;
    }
}

class Cliente {
    private $nombre;
    private $email;

    public function __construct($nombre, $email) {
        $this->nombre = $nombre;
        $this->email = $email;
    }
}

class Reserva {
    private $cliente;
    private $habitacion;
    private $fechaEntrada;
    private $fechaSalida;
    private $precioTotal;

    public function __construct(Cliente $cliente, Habitacion $habitacion, $fechaEntrada, $fechaSalida) {
        $this->cliente = $cliente;
        $this->habitacion = $habitacion;
        $this->fechaEntrada = new DateTime($fechaEntrada);
        $this->fechaSalida = new DateTime($fechaSalida);
        $this->calcularPrecioTotal();
    }

    private function calcularPrecioTotal() {
        $dias = $this->fechaEntrada->diff($this->fechaSalida)->days;
        $this->precioTotal = $this->habitacion->getPrecio() * $dias;
    }

    public function aplicarDescuento($porcentaje) {
        $this->precioTotal *= (1 - $porcentaje / 100);
    }
}

class Hotel {
    private $habitaciones = [];

    public function agregarHabitacion(Habitacion $habitacion) {
        $this->habitaciones[] = $habitacion;
    }

    public function buscarHabitacionDisponible($tipo) {
        return array_filter($this->habitaciones, function($habitacion) use ($tipo) {
            return $habitacion->getDisponibilidad() && $habitacion->getTipo() === $tipo;
        });
    }
}
```

## 6. Plataforma de Comercio Electrónico

```php
<?php
class Producto {
    private $id;
    private $nombre;
    private $precio;
    private $stock;

    public function __construct($id, $nombre, $precio, $stock) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    public function reducirStock($cantidad) {
        if ($this->stock >= $cantidad) {
            $this->stock -= $cantidad;
            return true;
        }
        return false;
    }

    public function getPrecio() {
        return $this->precio;
    }
}

class Carrito {
    private $productos = [];

    public function agregarProducto(Producto $producto, $cantidad = 1) {
        if ($producto->reducirStock($cantidad)) {
            $this->productos[] = [
                'producto' => $producto,
                'cantidad' => $cantidad
            ];
        }
    }

    public function calcularTotal() {
        return array_reduce($this->productos, function($total, $item) {
            return $total + ($item['producto']->getPrecio() * $item['cantidad']);
        }, 0);
    }

    public function aplicarDescuento($porcentaje) {
        return $this->calcularTotal() * (1 - $porcentaje / 100);
    }
}

class Pedido {
    private $carrito;
    private $cliente;
    private $fechaPedido;
    private $estado = 'pendiente';

    public function __construct(Carrito $carrito, Cliente $cliente) {
        $this->carrito = $carrito;
        $this->cliente = $cliente;
        $this->fechaPedido = new DateTime();
    }

    public function calcularImpuestos($porcentaje) {
        return $this->carrito->calcularTotal() * ($porcentaje / 100);
    }

    public function procesarPago($metodoPago) {
        $this->estado = 'procesando';
        // Lógica de procesamiento de pago
        $this->estado = 'completado';
    }
}
```

## 7. Gestor de Empleados y Nóminas

```php
<?php
class Empleado {
    private $nombre;
    private $cargo;
    private $salarioBase;
    private $departamento;
    private $vacaciones = 22;
    private $evaluaciones = [];

    public function __construct($nombre, $cargo, $salarioBase, Departamento $departamento) {
        $this->nombre = $nombre;
        $this->cargo = $cargo;
        $this->salarioBase = $salarioBase;
        $this->departamento = $departamento;
    }

    public function calcularSalario() {
        $bonificaciones = $this->calcularBonificaciones();
        return $this->salarioBase + $bonificaciones;
    }

    private function calcularBonificaciones() {
        $ultimaEvaluacion = end($this->evaluaciones);
        return $ultimaEvaluacion ? $ultimaEvaluacion['puntuacion'] * 100 : 0;
    }

    public function agregarEvaluacion($puntuacion, $comentarios) {
        $this->evaluaciones[] = [
            'fecha' => new DateTime(),
            'puntuacion' => $puntuacion,
            'comentarios' => $comentarios
        ];
    }

    public function tomarVacaciones($dias) {
        if ($this->vacaciones >= $dias) {
            $this->vacaciones -= $dias;
            return true;
        }
        return false;
    }
}

class Departamento {
    private $nombre;
    private $empleados = [];

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function agregarEmpleado(Empleado $empleado) {
        $this->empleados[] = $empleado;
    }

    public function calcularNomina() {
        return array_reduce($this->empleados, function($total, $empleado) {
            return $total + $empleado->calcularSalario();
        }, 0);
    }
}

class Nomina {
    private $departamentos = [];

    public function agregarDepartamento(Departamento $departamento) {
        $this->departamentos[] = $departamento;
    }

    public function calcularNominaTotal() {
        return array_reduce($this->departamentos, function($total, $departamento) {
            return $total + $departamento->calcularNomina();
        }, 0);
    }
}
```

## 8. Sistema de Seguimiento de Envíos

```php
<?php
class Paquete {
    private $peso;
    private $dimensiones;
    private $contenido;

    public function __construct($peso, $dimensiones, $contenido) {
        $this->peso = $peso;
        $this->dimensiones = $dimensiones;
        $this->contenido = $contenido;
    }

    public function getPeso() {
        return $this->peso;
    }
}

class Envio {
    private $paquete;
    private $origen;
    private $destino;
    private $estado = 'pendiente';

    public function __construct(Paquete $paquete, $origen, $destino) {
        $this->paquete = $paquete;
        $this->origen = $origen;
        $this->destino = $destino;
    }

    public function calcularTarifa() {
        $distancia = $this->calcularDistancia();
        $peso = $this->paquete->getPeso();
        return ($distancia * 0.5) + ($peso * 2);
    }

    private function calcularDistancia() {
        // Simulación de cálculo de distancia
        return rand(50, 500);
    }

    public function actualizarEstado($nuevoEstado) {
        $this->estado = $nuevoEstado;
    }

    public function getEstado() {
        return $this->estado;
    }
}

class Transportista {
    private $nombre;
    private $envios = [];

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function agregarEnvio(Envio $envio) {
        $this->envios[] = $envio;
    }

    public function rastrearEnvio(Envio $envio) {
        return array_filter($this->envios, function($e) use ($envio) {
            return $e === $envio;
        });
    }
}
```

## 9. Aplicación de Streaming de Música

```php
<?php
class Cancion {
    private $titulo;
    private $artista;
    private $duracion;

    public function __construct($titulo, $artista, $duracion) {
        $this->titulo = $titulo;
        $this->artista = $artista;
        $this->duracion = $duracion;
    }

    public function getArtista() {
        return $this->artista;
    }
}

class Playlist {
    private $nombre;
    private $canciones = [];

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function agregarCancion(Cancion $cancion) {
        $this->canciones[] = $cancion;
    }

    public function obtenerArtistas() {
        return array_unique(array_map(function($cancion) {
            return $cancion->getArtista();
        }, $this->canciones));
    }
}

class Usuario {
    private $nombre;
    private $playlists = [];
    private $historialReproduccion = [];

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function crearPlaylist($nombre) {
        $playlist = new Playlist($nombre);
        $this->playlists[] = $playlist;
        return $playlist;
    }

    public function agregarAHistorial(Cancion $cancion) {
        $this->historialReproduccion[] = $cancion;
    }

    public function generarRecomendaciones() {
        $artistas = array_map(function($cancion) {
            return $cancion->getArtista();
        }, $this->historialReproduccion);

        $artistasMasFrecuentes = array_count_values($artistas);
        arsort($artistasMasFrecuentes);

        return array_keys(array_slice($artistasMasFrecuentes, 0, 3));
    }
}
```

## 10. Sistema de Reserva de Vuelos

```php
<?php
class Vuelo {
    private $numero;
    private $origen;
    private $destino;
    private $fechaSalida;
    private $asientos = [];

    public function __construct($numero, $origen, $destino, $fechaSalida, $totalAsientos) {
        $this->numero = $numero;
        $this->origen = $origen;
        $this->destino = $destino;
        $this->fechaSalida = new DateTime($fechaSalida);

        // Inicializar asientos
        for ($i = 1; $i <= $totalAsientos; $i++) {
            $this->asientos[] = [
                'numero' => $i,
                'ocupado' => false
            ];
        }
    }

    public function buscarAsientoDisponible() {
        foreach ($this->asientos as &$asiento) {
            if (!$asiento['ocupado']) {
                $asiento['ocupado'] = true;
                return $asiento['numero'];
            }
        }
        return null;
    }

    public function calcularPrecio($temporada) {
        $precioBase = 200;
        $factores = [
            'alta' => 1.5,
            'media' => 1.2,
            'baja' => 1
        ];
        return $precioBase * $factores[$temporada];
    }
}

class Pasajero {
    private $nombre;
    private $documentoIdentidad;

    public function __construct($nombre, $documentoIdentidad) {
        $this->nombre = $nombre;
        $this->documentoIdentidad = $documentoIdentidad;
    }
}

class Reserva {
    private $vuelo;
    private $pasajero;
    private $asiento;
    private $estado = 'confirmada';

    public function __construct(Vuelo $vuelo, Pasajero $pasajero) {
        $this->vuelo = $vuelo;
        $this->pasajero = $pasajero;
        $this->asiento = $vuelo->buscarAsientoDisponible();
    }

    public function cancelar() {
        $this->estado = 'cancelada';
    }

    public function realizarCheckIn() {
        $this->estado = 'checked-in';
    }
}
```

(Los contenidos anteriores se mantienen)

## 8. Sistema de Seguimiento de Envíos

```php
<?php
class Paquete {
    private $peso;
    private $dimensiones;
    private $contenido;

    public function __construct($peso, $dimensiones, $contenido) {
        $this->peso = $peso;
        $this->dimensiones = $dimensiones;
        $this->contenido = $contenido;
    }

    public function getPeso() {
        return $this->peso;
    }
}

class Envio {
    private $paquete;
    private $origen;
    private $destino;
    private $estado = 'pendiente';

    public function __construct(Paquete $paquete, $origen, $destino) {
        $this->paquete = $paquete;
        $this->origen = $origen;
        $this->destino = $destino;
    }

    public function calcularTarifa() {
        $distancia = $this->calcularDistancia();
        $peso = $this->paquete->getPeso();
        return ($distancia * 0.5) + ($peso * 2);
    }

    private function calcularDistancia() {
        // Simulación de cálculo de distancia
        return rand(50, 500);
    }

    public function actualizarEstado($nuevoEstado) {
        $this->estado = $nuevoEstado;
    }

    public function getEstado() {
        return $this->estado;
    }
}

class Transportista {
    private $nombre;
    private $envios = [];

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function agregarEnvio(Envio $envio) {
        $this->envios[] = $envio;
    }

    public function rastrearEnvio(Envio $envio) {
        return array_filter($this->envios, function($e) use ($envio) {
            return $e === $envio;
        });
    }
}
```

## 9. Aplicación de Streaming de Música

```php
<?php
class Cancion {
    private $titulo;
    private $artista;
    private $duracion;

    public function __construct($titulo, $artista, $duracion) {
        $this->titulo = $titulo;
        $this->artista = $artista;
        $this->duracion = $duracion;
    }

    public function getArtista() {
        return $this->artista;
    }
}

class Playlist {
    private $nombre;
    private $canciones = [];

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function agregarCancion(Cancion $cancion) {
        $this->canciones[] = $cancion;
    }

    public function obtenerArtistas() {
        return array_unique(array_map(function($cancion) {
            return $cancion->getArtista();
        }, $this->canciones));
    }
}

class Usuario {
    private $nombre;
    private $playlists = [];
    private $historialReproduccion = [];

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function crearPlaylist($nombre) {
        $playlist = new Playlist($nombre);
        $this->playlists[] = $playlist;
        return $playlist;
    }

    public function agregarAHistorial(Cancion $cancion) {
        $this->historialReproduccion[] = $cancion;
    }

    public function generarRecomendaciones() {
        $artistas = array_map(function($cancion) {
            return $cancion->getArtista();
        }, $this->historialReproduccion);

        $artistasMasFrecuentes = array_count_values($artistas);
        arsort($artistasMasFrecuentes);

        return array_keys(array_slice($artistasMasFrecuentes, 0, 3));
    }
}
```

## 10. Sistema de Reserva de Vuelos

```php
<?php
class Vuelo {
    private $numero;
    private $origen;
    private $destino;
    private $fechaSalida;
    private $asientos = [];

    public function __construct($numero, $origen, $destino, $fechaSalida, $totalAsientos) {
        $this->numero = $numero;
        $this->origen = $origen;
        $this->destino = $destino;
        $this->fechaSalida = new DateTime($fechaSalida);

        // Inicializar asientos
        for ($i = 1; $i <= $totalAsientos; $i++) {
            $this->asientos[] = [
                'numero' => $i,
                'ocupado' => false
            ];
        }
    }

    public function buscarAsientoDisponible() {
        foreach ($this->asientos as &$asiento) {
            if (!$asiento['ocupado']) {
                $asiento['ocupado'] = true;
                return $asiento['numero'];
            }
        }
        return null;
    }

    public function calcularPrecio($temporada) {
        $precioBase = 200;
        $factores = [
            'alta' => 1.5,
            'media' => 1.2,
            'baja' => 1
        ];
        return $precioBase * $factores[$temporada];
    }
}

class Pasajero {
    private $nombre;
    private $documentoIdentidad;

    public function __construct($nombre, $documentoIdentidad) {
        $this->nombre = $nombre;
        $this->documentoIdentidad = $documentoIdentidad;
    }
}

class Reserva {
    private $vuelo;
    private $pasajero;
    private $asiento;
    private $estado = 'confirmada';

    public function __construct(Vuelo $vuelo, Pasajero $pasajero) {
        $this->vuelo = $vuelo;
        $this->pasajero = $pasajero;
        $this->asiento = $vuelo->buscarAsientoDisponible();
    }

    public function cancelar() {
        $this->estado = 'cancelada';
    }

    public function realizarCheckIn() {
        $this->estado = 'checked-in';
    }
}
```
