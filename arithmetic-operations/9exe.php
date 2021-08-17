<?php

/*
 * Write a program that calculates and displays a person's body mass index (BMI).
 * A person's BMI is calculated with the following formula:
 *
 * BMI = weight x 703 / height ^ 2.
 *
 * Where weight is measured in pounds and height is measured in inches.
 * Display a message indicating whether the person has optimal weight, is underweight, or is overweight.
 * A sedentary person's weight is considered optimal if his or her BMI is between 18.5 and 25.
 * If the BMI is less than 18.5, the person is considered underweight.
 * If the BMI value is greater than 25, the person is considered overweight.
 *
 *
 * Your program must accept metric units.
 */

function uscBMI(float $weightLBS, float $heightIN): string
{
    $bmi = 703 * ($weightLBS / $heightIN**2);
    $bmi = number_format($bmi, 2, '.', '');
    if ($bmi < 18.5)
    {
        return "Your BMI is {$bmi} and you are underweight." . PHP_EOL;
    } elseif ($bmi > 25)
    {
        return "Your BMI is {$bmi} and you are underweight." . PHP_EOL;
    } else {
        return "Your BMI is {$bmi} and it is optimal" . PHP_EOL;
    }
}

function metricBMI(float $weightMetric, float $heightMetric): string
{
    $bmi = ($weightMetric / $heightMetric**2);
    $bmi = number_format($bmi, 2, '.', '');
    if ($bmi < 18.5)
    {
        return "Your BMI is {$bmi} and you are underweight." . PHP_EOL;
    } elseif ($bmi > 25)
    {
        return "Your BMI is {$bmi} and you are underweight." . PHP_EOL;
    } else {
        return "Your BMI is {$bmi} and it is optimal" . PHP_EOL;
    }
}

echo "Choose between USC and METRIC!" . PHP_EOL;
echo "Press 1. if you want USC" . PHP_EOL;
echo "Press 2. if you want METRIC" . PHP_EOL;

$input = (int) readline("Enter your selection");

if ($input === 1)
{
    $inputWeight = (float) readline("Input your weight in Lbs: ");
    $inputHeight = (float) readline("Input your height in In: ");
    echo uscBMI($inputWeight, $inputHeight);
} elseif ($input === 2)
{
    $inputWeight = (float) readline("Input your weight in kg: ");
    $inputHeight = (float) readline("Input your height in m: ");
    echo metricBMI($inputWeight, $inputHeight);
} else {
    echo "Invalid input. Make sure that you enter 1 or 2" . PHP_EOL;
}