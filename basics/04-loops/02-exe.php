<?php

/*
 * Exercise 2
 * Create an array with integers (up to 10) and print them out using for loop.
 */

echo "EXERCISE 2" . PHP_EOL;
$nums = [10, 20, 30, 40, 50, 60, 70];

// sizeof() or count()
for ($i = 0; $i < sizeof($nums); $i++) {
    echo $nums[$i] . PHP_EOL;
}