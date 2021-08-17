<?php

/*
 * Exercise 5
 * Create a 2D associative array in 2nd dimension with fruits and their weight.
 * Create a function that determines if fruit has weight over 10 kg.
 * Create a secondary array with shipping costs per weight.
 * Meaning that you can say that over 10 kg shipping costs are 2 euros, otherwise its 1 euro.
 * Using foreach loop print out the values of the fruits and how much it would cost to ship this product.
 */
echo "-----EXERCISE 5-----" . PHP_EOL;

$fruits = [
    "banana" => [
        "fruit" => "Bananas",
        "weight" => 8
    ],
    "apple" => [
        "fruit" => "Apples",
        "weight" => 12
    ],
    "pear" => [
        "fruit" => "Pears",
        "weight" => 2
    ],
    "pineapple" => [
        "fruit" => "Pineapples",
        "weight" => 10.5
    ]
];

$shippingCosts = [1, 2];
// Create a function that determines if fruit has weight over 10 kg.
function determineWeight(int $weight): bool
{
    if ($weight >= 10)
    {
        return true;
    } else
    {
        return false;
    }
}
// Using foreach loop print out the values of the fruits and how much it would cost to ship this product.
foreach ($fruits as $fruit)
{
    if (determineWeight($fruit["weight"]))
    {
        //echo $fruit["fruit"] . $fruit["weight"] . $shippingCosts[1] . PHP_EOL;
        echo "{$fruit["fruit"]} weight {$fruit["weight"]}kg and shipping cost is {$shippingCosts[1]} euros" . PHP_EOL;
    } else {
        //echo $fruit["fruit"] . $fruit["weight"] . $shippingCosts[0] . PHP_EOL;
        echo "{$fruit["fruit"]} weight {$fruit["weight"]}kg and shipping cost is {$shippingCosts[0]} euro" . PHP_EOL;
    }
}
