<?php

function escribirTextoEnArchivo(string $ruta, string $texto): bool
{
    $directorio = dirname($ruta);

    if (!is_dir($directorio)) {
        mkdir($directorio, 0777, true);
    }

    if (file_put_contents($ruta, $texto)) {
        return true;
    }

    return false;
}


echo escribirTextoEnArchivo('archivos/prueba.txt', 'Esto es un ejemplo de texto para escribir en un archivo.');

echo escribirTextoEnArchivo('archivos/segundaPrueba.txt', 'Este es otro archivo de prueba. Estoy muy orgulloso de él, francamente');
