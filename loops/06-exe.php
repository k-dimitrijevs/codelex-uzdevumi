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


function makePyramid(int $size): string {
    $pyramid = "";
    $backSlash = "\ ";
    $backSlash = str_replace(' ', '', $backSlash);

    for ($times = ($size - 1) * 4; $times >= 0; $times = $times -4) {
        $pyramid .= str_repeat("/", $times);
        $pyramid .= str_repeat("*", ($size - 1) * 4 - $times);
        $pyramid .= str_repeat("*", ($size - 1) * 4 - $times);
        $pyramid .= str_repeat($backSlash, $times);
        $pyramid .= PHP_EOL;
    }
    return $pyramid;
}

echo makePyramid(5);
