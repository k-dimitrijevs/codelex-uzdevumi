<?php

/*
 * Exercise 1
 * Create a function that accepts any string and returns the same value with added "codelex" by the end of it. Print this value out.
 */
echo "-----EXERCISE 1-----" . PHP_EOL;

function addCodelex(string $str): string
{
    return "{$str} codelex" . PHP_EOL;
}

$str = "Hello World!";

echo addCodelex($str);