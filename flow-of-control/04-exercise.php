<?php

/*
 * Write a program which prints “Sunday”, “Monday”, ... “Saturday” if the int variable "dayNumber" is 0, 1, ..., 6, respectively. Otherwise, it shall print "Not a valid day".
 * Use:
 *  a "nested-if" statement
 *  a "switch-case-default" statement.
 */

$dayNumber = (int) readline("Enter a number of day: ");

echo "nested-if: ";

if ($dayNumber < 0 || $dayNumber > 6) {
    echo "Not a valid day." . PHP_EOL;
} elseif ($dayNumber === 0) {
    echo "Sunday" . PHP_EOL;
} elseif ($dayNumber === 1) {
    echo "Monday" . PHP_EOL;
} elseif ($dayNumber === 2) {
    echo "Tuesday" . PHP_EOL;
} elseif ($dayNumber === 3) {
    echo "Wednesday" . PHP_EOL;
} elseif ($dayNumber === 4) {
    echo "Thursday" . PHP_EOL;
} elseif ($dayNumber === 5) {
    echo "Friday" . PHP_EOL;
} elseif ($dayNumber === 6) {
    echo "Saturday" . PHP_EOL;
}

echo "switch-case-default: ";
switch ($dayNumber) {
    case 0:
        echo "Sunday" . PHP_EOL;
        break;
    case 1:
        echo "Monday" . PHP_EOL;
        break;
    case 2:
        echo "Tuesday" . PHP_EOL;
        break;
    case 3:
        echo "Wednesday" . PHP_EOL;
        break;
    case 4:
        echo "Thursday" . PHP_EOL;
        break;
    case 5:
        echo "Friday" . PHP_EOL;
        break;
    case 6:
        echo "Saturday" . PHP_EOL;
        break;
    default:
        echo "Not a valid day" . PHP_EOL;
}
