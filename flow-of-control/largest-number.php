<?php

$amount = (int) readline("Enter amount of numbers: ");
$numbers = [];

for ($i = 0; $i < $amount; $i++) {
    $number = (float) readline("Input the numbers: ");
    $numbers[] = $number;
}

//todo print the largest number
$largestNumber = max($numbers);
$numbersList = implode(', ', $numbers);

echo "Largest number of {$numbersList} is {$largestNumber}." . PHP_EOL;