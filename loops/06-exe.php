<?php

/*
 * Write a console program in a class named AsciiFigure that draws a figure of the following form, using for loops.
 *
 *      ////////////////\\\\\\\\\\\\\\\\
 *      ////////////********\\\\\\\\\\\\
 *      ////////****************\\\\\\\\
 *      ////************************\\\\
 *      ********************************
 *
 * Then, modify your program using an integer class constant so that it can create a similar figure of any size.
 * For instance, the diagram above has a size of 5. For example, the figure below has a size of 3:
 *
 *      ////////\\\\\\\\
 *      ////********\\\\
 *      ****************
 *
 * And the figure below has a size of 7:
 *
 *       ////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\
 *       ////////////////////********\\\\\\\\\\\\\\\\\\\\
 *       ////////////////****************\\\\\\\\\\\\\\\\
 *       ////////////************************\\\\\\\\\\\\
 *       ////////********************************\\\\\\\\
 *       ////****************************************\\\\
 *       ************************************************
 */

$size = 5;
$k = 2 * $size - 2;

/** NOT THE RIGHT FIGURE! */
//for ($i = 0; $i < $size; $i++)
//{
//
//    // inner loop to handle
//    // number spaces
//    // values changing acc.
//    // to requirement
//    for ($j = 0; $j < $k; $j++)
//        echo "/";
//
//    // decrementing k after
//    // each loop
//    $k = $k - 1;
//
//    // inner loop to handle
//    // number of columns
//    // values changing acc.
//    // to outer loop
//    for ($j = 0; $j <= $i; $j++ )
//    {
//
//        // printing stars
//        echo "*";
//    }
//
//    // ending line after
//    // each row
//    echo "\n";
//}
$forward = "";
$backward = "";

$backwardsSlash = "\ ";

for ($i = 0; $i < $size; $i++) {
    for ($j = 0; $j < 48; $j++) {
        if ($j < 16) {
            $forward = "/";
            echo $forward;
        } elseif ($j > 16 && $j <= 32) {
            $backward = str_replace(' ', '', $backwardsSlash);
            echo $backward;
        }
    }
    echo PHP_EOL;
}
