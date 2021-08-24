<?php

/*
 * Write a console program in a class named RollTwoDice that prompts the user for a desired sum,
 * then repeatedly rolls two six-sided dice (using a Random object to generate random numbers from 1-6)
 * until the sum of the two dice values is the desired sum. Here is the expected dialogue with the user:
 *
 * Desired sum: 9
 * 4 and 3 = 7
 * 3 and 5 = 8
 * 5 and 6 = 11
 * 5 and 6 = 11
 * 1 and 5 = 6
 * 6 and 3 = 9
 */

$desiredSum = (int) readline("Enter your desired sum: ");
// Check for valid input
function validate(int $desiredSum): bool {
    if ($desiredSum > 12 || $desiredSum < 2) {
        return false;
    }
    return true;
}

while (validate($desiredSum) === false) {
    echo "Invalid input" . PHP_EOL;
    $desiredSum = (int) readline("Enter your desired sum: ");
}
$diceRoll = 0;

echo "Desired sum: {$desiredSum}" . PHP_EOL;
while ($diceRoll !== $desiredSum) {
    $firstDice = rand(1, 6);
    $secondDice = rand(1, 6);
    $diceRoll = $firstDice + $secondDice;

    echo "{$firstDice} and {$secondDice} = {$diceRoll}" . PHP_EOL;
}