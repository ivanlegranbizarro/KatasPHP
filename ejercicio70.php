<?php

/* ### 1. filtrar y transformar array de productos
**enunciado:** crea una función que reciba un array de productos (con nombre, precio y categoría) y devuelva solo los productos de una categoría específica, con un descuento del 10% aplicado. */


function filtrarProductosPorCategoria(array $arrayProductos, string $categoria): array
{
    $arrayProductosFiltrados = [];
    foreach ($arrayProductos as $item) {
        if ($item['categoria'] === $categoria) {
            $item['precio'] = $item['precio'] * 0.9;
            $arrayProductosFiltrados[] = $item;
        }
    }
    return $arrayProductosFiltrados;
}

$productos = [
    ['nombre' => 'Producto 1', 'precio' => 10, 'categoria' => 'A'],
    ['nombre' => 'Producto 2', 'precio' => 20, 'categoria' => 'B'],
    ['nombre' => 'Producto 3', 'precio' => 30, 'categoria' => 'C'],
    ['nombre' => 'Producto 4', 'precio' => 40, 'categoria' => 'A'],
    ['nombre' => 'Producto 5', 'precio' => 50, 'categoria' => 'B'],
    ['nombre' => 'Producto 6', 'precio' => 60, 'categoria' => 'C'],
    ['nombre' => 'Producto 7', 'precio' => 70, 'categoria' => 'A'],
    ['nombre' => 'Producto 8', 'precio' => 80, 'categoria' => 'B'],
];


print_r(filtrarProductosPorCategoria($productos, 'A'));
