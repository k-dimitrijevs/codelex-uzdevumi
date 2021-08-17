<?php

/*
 * Write a program called CheckOddEven which prints "Odd Number"
 * if the int variable “number” is odd, or “Even Number” otherwise.
 * The program shall always print “bye!” before exiting.
 */

$number = (int) readline("Enter a number: ");

function checkOddEven(int $number): string
{
    if ($number % 2 !== 0)
    {
        return "Odd Number" . PHP_EOL;
    }
    return "Even Number" . PHP_EOL;
}

echo checkOddEven($number);

echo "bye!" . PHP_EOL;
exit;