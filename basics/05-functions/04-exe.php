<?php

/*
 * Exercise 4
 * Create an array of objects that uses the function of exercise 3 but in loop printing out if the person has reached age of 18.
 */
echo "-----EXERCISE 4-----" . PHP_EOL;

function isAdult(stdClass $person): string
{
    if ($person->age >= 18) {
        return "{$person->name} {$person->surname} has reached age of 18" . PHP_EOL;
    }

    return "{$person->name} {$person->surname} has not reached age of 18" . PHP_EOL;
}

$jane = new stdClass();
$jane->name = "Jane";
$jane->surname = "Doe";
$jane->age = 23;
$jane->birthday = "09-09-1992";

$john = new stdClass();
$john->name = "John";
$john->surname = "Doe";
$john->age = 13;
$john->birthday = "05-02-2005";

$joe = new stdClass();
$joe->name = "Joe";
$joe->surname = "Doe";
$joe->age = 27;
$joe->birthday = "09-12-1988";

$people = [$jane, $john, $joe];

//var_dump($people);

foreach ($people as $person) {
    echo isAdult($person);
}