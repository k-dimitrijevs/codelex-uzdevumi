<?php

/*
 * Exercise 4
 * Create a non-associative array with integers and print out only integers that divides by 3 without any left.
 */

echo "EXERCISE 4" . PHP_EOL;

$numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

for ($i = 0; $i < sizeof($numbers); $i++) {
    if ($i % 3 === 0) {
        echo $i . PHP_EOL;
    }
}