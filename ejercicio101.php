<?php
/* ### 9. Validador de Contraseñas
Implementa una función que valide si una contraseña cumple con los siguientes criterios: al menos 8 caracteres, una mayúscula, una minúscula y un número. */


function validaPassword(string $password): bool
{
    return (bool) preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password);
}
