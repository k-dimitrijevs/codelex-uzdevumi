<?php

/*
 * Modify the example program
 * to compute the position of an object after falling for 10 seconds,
 * outputting the position in meters. The formula in Math notation is:
 *
 * x(t) = 0.5 * a * t^2 + vi * t + xi
 *
 * a  | acceleration     | -9.81
 * t  | time             | 10
 * vi | initial velocity | 0
 * xi | initial position | 0
 *
 * Note: The correct value is -490.5m.
 */

$a = (-9.81);
$t = 10;
$vi = 0;
$xi = 0;
//$result = 0.5 * (-9.81) * 10**2 + 0 * 10 + 0;
//echo $result;

function objectPosition(float $a, float $t, float $vi, float $xi): float
{
    return 0.5 * $a * $t**2 + $vi * $t + $xi;
}

echo objectPosition($a, $t, $vi, $xi) . PHP_EOL;
