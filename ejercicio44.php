<?php
/* ### 3. Validador de Contraseñas
Implementa un validador de contraseñas que verifique ciertos criterios de seguridad.

**Requisitos:**
- Mínimo 8 caracteres de longitud
- Al menos una letra mayúscula
- Al menos un número
- Al menos un carácter especial (!@#$%^&*)
- Devolver true si cumple todos los requisitos, false si no */

function validarPassword(string $password): bool
{
    return strlen($password) >= 8
        && preg_match('/[A-Z]/', $password) > 0
        && preg_match('/[0-9]/', $password) > 0
        && preg_match('/[!@#$%^&*]/', $password) > 0;
}
