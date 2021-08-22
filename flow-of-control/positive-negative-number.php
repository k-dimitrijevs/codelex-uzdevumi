<?php

// echo "Enter the number.";
$number = (float) readline("Enter the number: ");

//todo print if number is positive or negative

/*
 * if ($num1 >= 0) {
 *   echo "Positive" . PHP_EOL;
 * } else {
 *   echo "Negative" . PHP_EOL;
 * }
 */
echo $number >= 0 ? "Positive" : "Negative";