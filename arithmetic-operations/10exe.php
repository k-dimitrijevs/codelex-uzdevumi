<?php

/*
 * Design a Geometry class with the following methods:
 *
 *   A static method that accepts the radius of a circle and returns the area of the circle. Use the following formula:
 *       Area = π * r * 2
 *       Use Math.PI for π and r for the radius of the circle
 *   A static method that accepts the length and width of a rectangle and returns the area of the rectangle. Use the following formula:
 *       Area = Length x Width
 *   A static method that accepts the length of a triangle’s base and the triangle’s height. The method should return the area of the triangle. Use the following formula:
 *       Area = Base x Height x 0.5
 *
 * The methods should display an error message if negative values are used for the circle’s radius, the rectangle’s length or width, or the triangle’s base or height.
 *
 * Next write a program to test the class, which displays the following menu and responds to the user’s selection:
 */

function circleArea(float $radius): string
{
    if ($radius <= 0)
    {
        return "Invalid number. Radius can't be 0 or negative!" . PHP_EOL;
    }
    return "Circle Area: " . number_format(pi() * $radius ** 2, 2, '.', '');
}


function rectangleArea(float $length, float $width): string
{
    if ($length <= 0 || $width <= 0)
    {
        return "Invalid number. Length and width must be positive numbers" . PHP_EOL;
    }
    return "Rectangle Area: " . number_format($length * $width, 2, '.', '');
}

function triangleArea(float $base, float $height): string
{
    if ($base <= 0 || $height <= 0)
    {
        return "Invalid number. Base and height must be positive numbers" . PHP_EOL;
    }
    return "Triangle Area: " . number_format(($base * $height) * 0.5, 2, '.', '');
}

echo "Geometry Calculator" . PHP_EOL;
echo "1. Calculate the Area of a Circle" . PHP_EOL;
echo "2. Calculate the Area of a Rectangle" . PHP_EOL;
echo "3. Calculate the Area of a Triangle" . PHP_EOL;
echo "4. Quit" . PHP_EOL;
$input = (int) readline("Enter your choice (1-4) : ");


if ($input === 1)
{
    $radius = (float) readline("Enter radius: ");
    echo circleArea($radius) . PHP_EOL;
} elseif ($input === 2)
{
    $length = (float) readline("Enter length: ");
    $width = (float) readline("Enter width: ");
    echo rectangleArea($length, $width) . PHP_EOL;
} elseif ($input === 3)
{
    $base = (float) readline("Enter base: ");
    $height = (float) readline("Enter height: ");
    echo triangleArea($base, $height) . PHP_EOL;
} elseif ($input === 4)
{
    echo "bye!" . PHP_EOL;
    exit;
} else
{
    echo "Error! INVALID INPUT" . PHP_EOL;
    exit;
}
