<?php
/* ### 2. Calculadora de Días
Implementa una función que calcule el número de días laborables (lunes a viernes) entre dos fechas. */


function calcularLaborables(DateTime $fechaInicio, DateTime $fechaFinal): int
{
    $diasLaborables = 0;
    $periodoDias = new DatePeriod($fechaInicio, new DateInterval('P1D'), $fechaFinal->modify('+1 day'));
    foreach ($periodoDias as $dia) {
        if ($dia->format('N') >= 1 && $dia->format('N') <= 5) {
            $diasLaborables++;
        }
    }
    return $diasLaborables;
}


echo calcularLaborables(new DateTime('2023-01-01'), new DateTime('2023-01-31')) . PHP_EOL;
