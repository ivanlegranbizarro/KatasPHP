<?php
/* ### Kata 6: Agrupación de Datos
Implementa una función que agrupe un array de productos por su categoría. */


function agruparProductos(array $productos): array
{
    $arrayProductosAgrupados = [];
    foreach ($productos as $producto) {
        $categoria = $producto['categoria'];
        $arrayProductosAgrupados[$categoria][] = $producto;
    }

    return $arrayProductosAgrupados;
}

$arrayProductos = [
    [
        'nombre' => 'Producto 1',
        'precio' => 10.99,
        'categoria' => 'Electronics'
    ],
    [
        'nombre' => 'Producto 2',
        'precio' => 19.99,
        'categoria' => 'Electronics'
    ],
    [
        'nombre' => 'Producto 3',
        'precio' => 29.99,
        'categoria' => 'Electronics'
    ],
    [
        'nombre' => 'Producto 4',
        'precio' => 39.99,
        'categoria' => 'Art'
    ],
    [
        'nombre' => 'Producto 5',
        'precio' => 49.99,
        'categoria' => 'Art'
    ],
    [
        'nombre' => 'Producto 6',
        'precio' => 59.99,
        'categoria' => 'Art'
    ]
];

print_r(agruparProductos($arrayProductos));
