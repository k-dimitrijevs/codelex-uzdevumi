<?php

/*
* Exercise 5
* Given variable (int) 50 create a condition that prints out "correct" if the variable is inside the range.
* Range should be stored within the 2 separated variables $y and $z.
*/

$newRangeNumber = 50;
$y = 10;
$z = 72;

if ($newRangeNumber >= $y && $newRangeNumber <= $z) {
echo "correct" . PHP_EOL;
}