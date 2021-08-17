<?php

/*
 * Write a program to accept two integers and return true if the either one is 15 or if their sum or difference is 15.
 */

$num1 = (int) readline("Enter 1st number: ");
$num2 = (int) readline("Enter 2nd number: ");

function checkNums(int $num1, int $num2): bool
{
    if ($num1 === 15 || $num2 === 15 || $num1 + $num2 === 15 || $num1 - $num2 === 15 || $num2 - $num1 === 15) {
        return true;
    }
    return false;
}

var_dump(checkNums($num1, $num2));

if (checkNums($num1, $num2))
{
    echo "True" . PHP_EOL;
} else
{
    echo "False" . PHP_EOL;
}

