<?php

/*
* Exercise 6
* Create a variable $plateNumber that stores your car plate number. Create a switch statement that prints out that it's your car in case of your number.
*/

$plateNumber = "MP-1234";
// $plateNumber = "NP-1234";

switch ($plateNumber) {
case "MP-1234":
case "NP-1234":
echo "This is your car plate number" . PHP_EOL;
break;
default:
echo "Couldn't find your car plate number" . PHP_EOL;
}