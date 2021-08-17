<?php

/*
 * Exercise 2
 * Create a function that accepts 2 integer arguments.
 * First argument is a base value and the second one is a value it's been multiplied by.
 *  For example, given argument 10 and 5 prints out 50
 */
echo "-----EXERCISE 2-----" . PHP_EOL;

function multiply(int $baseValue, int $multiplier): int
{
    return  $baseValue * $multiplier;
}

$num = 10;
$num2 = 5;

echo multiply($num, $num2) . PHP_EOL;
