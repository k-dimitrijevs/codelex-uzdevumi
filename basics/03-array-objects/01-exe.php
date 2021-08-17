<?php

/*
 * Exercise 1
 * Create a non-associative array with 3 integer values and display the total sum of them.
 */
echo "EXERCISE 1" . PHP_EOL;

$sumArr = [2, 5, 7];

// echo $sumArr[0] + $sumArr[1] + $sumArr[2] . PHP_EOL;
echo array_sum($sumArr) . PHP_EOL;