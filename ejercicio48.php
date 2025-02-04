<?php
/* 5. **Validar un correo electrónico**:
   Escribe una función que valide si una cadena es un correo electrónico válido.
 */


function comprobarEmail(string $cadena): bool
{
    return filter_var($cadena, FILTER_VALIDATE_EMAIL);
}


var_dump(comprobarEmail('sdfasdfsdf'));

var_dump(comprobarEmail('pepe@pepe'));

var_dump(comprobarEmail('pepe@pepe.com'));
