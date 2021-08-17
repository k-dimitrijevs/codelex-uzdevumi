<?php

/*
 * Exercise 3
 * Create a person object with name, surname and age. Create a function that will determine
 * if the person has reached 18 years of age. Print out if the person has reached age of 18 or not.
 */
echo "----EXERCISE 3----" . PHP_EOL;

$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->age = 17;
// $person->age = 21;

function isAdult(stdClass $person): string
{
    if ($person->age >= 18) {
        return "{$person->name} {$person->surname} has reached age of 18" . PHP_EOL;
    }

    return "{$person->name} {$person->surname} has not reached age of 18" . PHP_EOL;
}

echo isAdult($person);