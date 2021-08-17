<?php

/*
 * Exercise 3
 * Using dump method, dump out all 3 values.
 */
echo "EXERCISE 3" . PHP_EOL;

$person2 = new stdClass();
$person2->name = "John";
$person2->surname = "Doe";
$person2->age = 50;

// var_dump(person2);

var_dump($person2->name);
var_dump($person2->surname);
var_dump($person2->age);