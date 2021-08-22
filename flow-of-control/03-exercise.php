<?php

/*
 * Write a program that reads a positive integer and count the number of digits the number has.
 */

$num = (int) readline("Enter a positive integer: ");

echo $num < 0 ? "Error. Integer you entered is negative" . PHP_EOL : strlen($num) . PHP_EOL;