<?php

function validarTelefono(string|int $telf): bool
{
    return preg_match('/[0-9]{9}/', $telf);
}
