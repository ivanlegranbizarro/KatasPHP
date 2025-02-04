<?php
/* 6. **Leer un archivo y contar las líneas**:
   Escribe una función que lea un archivo de texto y devuelva el número de líneas que contiene.
*/

function leerArchivoYContarLineas(string $direccion): int
{
    $archivo = fopen($direccion, 'r');
    if (!$archivo) {
        return 0;
    }

    $lineas = 0;

    while (fgets($archivo) !== false) {
        $lineas++;
    }
    fclose($archivo);
    return $lineas;
}



echo leerArchivoYContarLineas('ejercicio49.php');
