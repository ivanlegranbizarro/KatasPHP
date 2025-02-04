<?php

function convertirFicheroEnArray(string $path): array
{
    try {
        if (!file_exists($path)) {
            throw new Exception('El fichero no existe');
        }
        return file($path, FILE_IGNORE_NEW_LINES);
    } catch (\Throwable $e) {
        echo $e->getMessage();
        return [];
    }
}
