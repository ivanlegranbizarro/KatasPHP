<?php
/* 10. Crear una pirámide
Crea una función llamada piramide que reciba un número entero n y genere una pirámide con n niveles. 
 */

function piramide(int $n): void
{
    for ($i = 1; $i <= $n; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo "*";
        }
        echo "\n";
    }
}
