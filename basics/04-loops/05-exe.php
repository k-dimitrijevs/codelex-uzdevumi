<?php

/*
 * Exercise 5
 * Create an associative array with objects of multiple persons.
 * Each person should have a name, surname, age and birthday. Using loop (by your choice) print out every person's personal data.
 */
echo "EXERCISE 5" . PHP_EOL;


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

$persons = [$jane, $john, $joe];

//var_dump($persons);

foreach ($persons as $person) {
    echo "{$person->name} {$person->surname}. Age: {$person->age}, Birthday: {$person->birthday}" . PHP_EOL;
}