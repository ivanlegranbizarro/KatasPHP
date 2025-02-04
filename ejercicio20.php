<?php
/* Task
Given an array/list [] of integers , Find the product of the k maximal numbers.

Notes
Array/list size is at least 3 .

Array/list's numbers Will be mixture of positives , negatives and zeros

Repetition of numbers in the array/list could occur. */

function maxProduct(array $arr, int $size = 3): int
{
    try {
        if (count($arr) < $size || $size < 3) {
            throw new Exception('Size must be at least 3');
        }

        sort($arr);
        $reversedArray = array_reverse($arr);
        $arrayWithBigNumbers = array_slice($reversedArray, 0, 2);
        return array_product($arrayWithBigNumbers);
    } catch (\Throwable $e) {
        echo $e->getMessage();
    }
}
