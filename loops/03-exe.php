<?php

/*
 * Write a program that asks the user to enter two words.
 * The program then prints out both words on one line.
 * The words will be separated by enough dots so that the total line length is 30:
 *
 * Enter first word:
 *      turtle
 * Enter second word
 *      153
 * turtle....................153
 */


$firstWord = readline("Enter the first word: ");
$secondWord = readline("Enter the second word: ");

$worldLen = strlen($firstWord) + strlen($secondWord);

$dots = "";

// Can be replaced with string repeat
for ($i = 0; $i < 30 - $worldLen; $i++) {
    $dots .= ".";
}

echo strlen($dots) . PHP_EOL;
echo "{$firstWord}{$dots}{$secondWord}" . PHP_EOL;