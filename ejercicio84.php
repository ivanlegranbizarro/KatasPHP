<?php
/* ### Kata 13: Mapeo de Datos Complejо
Implementa una función que reciba un array de estudiantes con propiedades como nombre, calificaciones y cursos, y genere un nuevo array con el promedio de calificaciones por curso. */


function generarPromedioCalificaciones(array $array): int|float
{
    $resultado = 0;
    $calificaciones = $array['calificaciones'];
    $resultado = array_sum($calificaciones) / count($calificaciones);
    return $resultado;
}


function implementarPromedioCalificaciones(array $array): array
{
    $nuevoArray = [];
    foreach ($array as $estudiante) {
        $estudiante['promedio'] = generarPromedioCalificaciones($estudiante);
        $nuevoArray[] = $estudiante;
    }
    return $nuevoArray;
}

function solucionarKataSoloConArrayMap(array $array): array
{
    return array_map(function ($estudiante) {
        $estudiante['promedio'] = array_sum($estudiante['calificaciones']) / count($estudiante['calificaciones']);
        return $estudiante;
    }, $array);
}


$estudiantes = [
    ['nombre' => 'Alice', 'calificaciones' => [8, 9, 7], 'cursos' => ['Matemáticas', 'Lengua', 'Ciencias']],
    ['nombre' => 'Bob', 'calificaciones' => [7, 8, 9], 'cursos' => ['Historia', 'Geografia', 'Ciencias']],
    ['nombre' => 'Charlie', 'calificaciones' => [9, 8, 7], 'cursos' => ['Matemáticas', 'Lengua', 'Ciencias']],
];


// print_r(implementarPromedioCalificaciones($estudiantes));

print_r(solucionarKataSoloConArrayMap($estudiantes));
