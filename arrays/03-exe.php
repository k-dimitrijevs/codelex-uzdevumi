<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

$input = (int) readline("Enter the value to search for: ");

//todo check if an array contains a value user entered
function checkArray(array $numbers, int $input): string {
    for ($i = 0; $i < count($numbers); $i++) {
        if ($input === $numbers[$i]) {
            return "Array contains {$input} at position {$i}" . PHP_EOL;
            break;
        }
    }
    return "Array does not contain value {$input}" . PHP_EOL;
}

echo checkArray($numbers, $input);
