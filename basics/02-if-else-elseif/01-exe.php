<?php

/*
 * Exercise 1
 * Given variables (int) 10, string "10" determine if they both are the same.
 */

$intNumber = 10;
$strNumber = "10";

if ($intNumber === $strNumber) {
    echo "Same" . PHP_EOL;
} else {
    echo "Not the same" . PHP_EOL;
}
