<?php

function validarUrl(string $url): bool
{
    return filter_var($url, FILTER_VALIDATE_URL);
}
