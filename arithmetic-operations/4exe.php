<?php

/*
 * Write a program to compute the product of integers from 1 to 10
 * (i.e., 1×2×3×...×10), as an int.
 * Take note that it is the same as factorial of N.
 */

$firstNum = 1;
$lastNum = 10;

function computeProductOfInt(int $firstNum, int $lastNum): int
{
    $fact = 1;

    for ($i = $firstNum; $i <= $lastNum; $i++){
        $fact = $fact * $i;
    }
    return $fact;
}

echo computeProductOfInt($firstNum, $lastNum) . PHP_EOL;