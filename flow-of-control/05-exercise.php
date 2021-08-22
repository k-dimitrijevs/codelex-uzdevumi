<?php

/*
 * On your phone keypad, the alphabets are mapped to digits as follows: ABC(2), DEF(3), GHI(4), JKL(5), MNO(6), PQRS(7), TUV(8), WXYZ(9).
 * Write a program called PhoneKeyPad, which prompts user for a String (case-insensitive), and converts to a sequence of keypad digits.
 *
 * Use:
 *
 *   a "nested-if" statement
 *   a "switch-case-default" statement
 * Hint: In switch-case, you can handle multiple cases by omitting the break statement, e.g.,
 *
 */

$input = strtoupper((string) readline("Enter a word: "));

//function convertToDigits(string $input): string {
//    $input = str_split($input);
//    $keyPadDigits = [];
//
//    for ($i = 0; $i < count($input); $i++) {
//        if ($input[$i] === "A" || $input[$i] === "B" || $input[$i] === "C") {
//            array_push($keyPadDigits, 2);
//        } elseif ($input[$i] === "D" || $input[$i] === "E" || $input[$i] === "F") {
//            array_push($keyPadDigits, 3);
//        } elseif ($input[$i] === "G" || $input[$i] === "H" || $input[$i] === "I") {
//            array_push($keyPadDigits, 4);
//        } elseif ($input[$i] === "J" || $input[$i] === "K" || $input[$i] === "L") {
//            array_push($keyPadDigits, 5);
//        } elseif ($input[$i] === "M" || $input[$i] === "N" || $input[$i] === "O") {
//            array_push($keyPadDigits, 6);
//        } elseif ($input[$i] === "P" || $input[$i] === "Q" || $input[$i] === "R" || $input[$i] = "S") {
//            array_push($keyPadDigits, 7);
//        }elseif ($input[$i] === "T" || $input[$i] === "U" || $input[$i] === "V") {
//            array_push($keyPadDigits, 8);
//        } elseif ($input[$i] === "W" || $input[$i] === "X" || $input[$i] === "Y" || $input[$i] === "Z") {
//            array_push($keyPadDigits, 9);
//        }
//    }
//
//    return implode("", $keyPadDigits);
//}
//
//echo convertToDigits($input) . PHP_EOL;
/*
 * switch ($letter) {
        case in_array($letter, ["A", "B", "C"]):
            return "2";
        case in_array($letter, ["D", "E", "F"]):
            return "3";
        case in_array($letter, ["G", "H", "I"]):
            return "4";
        case in_array($letter, ["J", "K", "L"]):
            return "5";
        case in_array($letter, ["M", "N", "O"]):
            return "6";
        case in_array($letter, ["P", "Q", "R", "S"]):
            return "7";
        case in_array($letter, ["T", "U", "V"]):
            return "8";
        case in_array($letter, ["W", "X", "Y", "Z"]):
            return "9";
    }
    return "oh no ";
 */

$letters = str_split($input);

function letterToDigit(string $letter): string {

    $keypad = [
        "ABC" => "2",
        "DEF" => "3",
        "GHI" => "4",
        "JKL" => "5",
        "MNO" => "6",
        "PQRS" => "7",
        "TUV" => "8",
        "WXYZ" => "9",
    ];

    foreach ($keypad as $key => $value) {
        $position = strpos($key, $letter);
        if ($position !== false) {
            return $value . str_repeat($value, $position) . " ";
        }
    }

    return "NOI" . PHP_EOL;
}

$keyPad = "";

foreach ($letters as $letter) {
    $keyPad .= letterToDigit($letter);
}

echo $keyPad . PHP_EOL;