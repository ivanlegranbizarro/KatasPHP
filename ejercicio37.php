<?php
/* Desarrolla clases Producto, Carrito y Pedido. Implementa métodos para añadir productos, calcular total y procesar pedidos. */

class Producto
{
    public function __construct(
        public string $nombre,
        public int|float $precio
    ) {}
}

class Carrito
{
    public function __construct(
        public array $numProductos = [],
    ) {}

    public function agregarProducto(Producto $producto): self
    {
        $this->numProductos[] = $producto;
        return $this;
    }
}

class Pedido
{
    public static int $generadorId = 0;

    public function __construct(
        public Carrito $carrito,
    ) {
        self::$generadorId++;
    }

    public function obtenerTotal(): int|float
    {
        $arrayPrecios = $this->carrito->numProductos;
        return array_sum(array_column($arrayPrecios, 'precio'));
    }
}
