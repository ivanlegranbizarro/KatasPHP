<?php
/* ### 1. Generador de Slugs
Crea una función que convierta un título en un slug para URLs. Debe convertir espacios en guiones, eliminar caracteres especiales y acentos, usar solo minúsculas y no permitir guiones consecutivos.
Ejemplo: "¡Hola, Mundo PHP!" → "hola-mundo-php" */


function crearSlug(string $cadena): string
{
    $cadena = iconv('UTF-8', 'ASCII//TRANSLIT', $cadena);
    $cadena = strtolower($cadena);
    $cadena = preg_replace('/[^a-z0-9\s-]/', '', $cadena); // Mantener espacios
    $cadena = str_replace(' ', '-', $cadena); // Reemplazar espacios por guiones
    $cadena = preg_replace('/-+/', '-', $cadena); // Evitar guiones consecutivos
    return trim($cadena, '-'); // Eliminar guiones al inicio y al final
}