<?php

function devolverContenidoArchivo(string $rutaArchivo): string
{
    return file_get_contents($rutaArchivo);
}


echo devolverContenidoArchivo('contenidoPrueba.txt');
