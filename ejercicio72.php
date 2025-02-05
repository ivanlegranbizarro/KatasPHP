<?php
/* ### 3. Ordenar y Agrupar Arrays
**Enunciado:** Escribe una función que reciba un array de estudiantes (con nombre, edad y nota) y devuelva un array agrupado por rango de notas: aprobados, notables y sobresalientes. */

function agruparEstudiantes(array $estudiantes): array
{
    foreach ($estudiantes as $estudiante) {
        if ($estudiante['nota'] >= 5) {
            $notasEstudiantes['aprobados'][] = $estudiante;
        } elseif ($estudiante['nota'] < 5) {
            $notasEstudiantes['suspendidos'][] = $estudiante;
        }
    }
    return $notasEstudiantes;
}


$estudiantes = [
    ['nombre' => 'Iván', 'edad'  => 20, 'nota' => 8],
    ['nombre' => 'Paula', 'edad'  => 21, 'nota' => 9],
    ['nombre' => 'Juan', 'edad'  => 22, 'nota' => 4],
    ['nombre' => 'María', 'edad'  => 23, 'nota' => 7],
    ['nombre' => 'Carlos', 'edad'  => 24, 'nota' => 6],
    ['nombre' => 'Luis', 'edad'  => 25, 'nota' => 3],
];


print_r(agruparEstudiantes($estudiantes));
