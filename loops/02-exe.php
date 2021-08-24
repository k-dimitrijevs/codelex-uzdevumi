<?php

echo "Input number of terms: " . PHP_EOL;

//todo complete loop to multiply i with itself n times, it is NOT allowed to use built-in pow() function

$num = (int) readline("Base: ");
$exp = (int) readline("Exponent: ");
$result = 1;

for ($i = 0; $i < $exp; $i++) {
    $result *= $num;
}

echo "Result: {$result}" . PHP_EOL;
echo "Built-in result: " . pow($num, $exp) . PHP_EOL;