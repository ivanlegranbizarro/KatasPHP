<?php
/* ### Kata 3: Transformación de Datos
Implementa una función que reciba un array de usuarios con nombre y edad, y devuelva un nuevo array solo con los nombres de los mayores de 18 años. */

function filtrarAdultos(array $usuarios): array
{
    return array_filter($usuarios, function ($usuario) {
        return $usuario['edad'] > 17;
    });
}


$arrayUsuarios = [
    ['nombre' => 'Juan', 'edad' => 20],
    ['nombre' => 'Pedro', 'edad' => 15],
    ['nombre' => 'María', 'edad' => 25],
    ['nombre' => 'Luis', 'edad' => 17],
    ['nombre' => 'Ana', 'edad' => 22]
];


print_r(filtrarAdultos($arrayUsuarios));
