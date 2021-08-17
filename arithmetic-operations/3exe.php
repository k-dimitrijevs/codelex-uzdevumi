<?php

/*
 * Write a program to produce the sum of 1, 2, 3, ..., to 100.
 * Store 1 and 100 in variables lower bound and upper bound,
 * so that we can change their values easily.
 * Also compute and display the average.
 * The output shall look like:
 *
 * The sum of 1 to 100 is 5050
 * The average is 50.5
 */

$lowerBound = 1;
$upperBound = 100;

function sumAndAvg(int $firstNum, int $lastNum): string
{
    $sum = 0;
    $count = 0;
    for ($i = $firstNum; $i <= $lastNum; $i++) {
        $sum += $i;
        $count++;
    }
    $avg = $sum / $count;
    return "The sum of {$firstNum} to {$lastNum} is {$sum}" . PHP_EOL . "The average is {$avg}" . PHP_EOL;
}

echo (sumAndAvg($lowerBound, $upperBound));