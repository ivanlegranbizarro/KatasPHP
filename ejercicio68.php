<?php

/* ### 8. Equilibrar paréntesis
**Enunciado:** Escribe una función que determine si una cadena de paréntesis está bien equilibrada. Por ejemplo: "(())" es válida, "(()" no lo es. */


function determinarEquilibrioParentesis(string $parentesis): bool
{
    $balance = 0;
    $parentesisToArray = str_split($parentesis);
    foreach ($parentesisToArray as $parentesis) {
        if ($parentesis == '(') {
            $balance++;
        } elseif ($parentesis == ')') {
            $balance--;
        }
        if ($balance < 0) {
            return false;
        }
    }
    return $balance == 0;
}


// Pruebas
var_dump(determinarEquilibrioParentesis("(())")); // true
var_dump(determinarEquilibrioParentesis("(()"));  // false
var_dump(determinarEquilibrioParentesis(")("));   // false
var_dump(determinarEquilibrioParentesis("((()))"));// true
