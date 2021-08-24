<?php

/*
 * Write a console program in a class named FizzBuzz that prompts the user for an integer,
 * then prints all of the numbers from one to that integer, separated by spaces.
 * Use a loop to print the numbers.
 *
 * But for multiples of three, print "Fizz" instead of the number,
 * and for the multiples of five print "Buzz".
 *
 * For numbers which are multiples of both three and five print "FizzBuzz".
 *
 * Drop to a new line after print each 20 numbers. If the user typed 100, the output would be:
 */

$userInput = (int) readline("Input and integer: ");

for ($i = 1; $i <= $userInput; $i++)
{
    if ($i % 3 === 0 && $i % 5 === 0)
    {
        echo "FizzBuzz ";
    } elseif ($i % 3 === 0)
    {
        echo "Fizz ";
    } elseif ($i % 5 === 0 )
    {
        echo "Buzz ";
    } else
    {
        echo $i . " ";
    }

    if ($i % 20 === 0)
    {
        echo PHP_EOL;
    }
}