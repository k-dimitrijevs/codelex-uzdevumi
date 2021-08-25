<?php

/*
 * Rock-paper-scissors game.
 */

$playAgain = "y";

while ($playAgain = "y"){
    $rps = ["rock", "paper", "scissors"];
    shuffle($rps);
    $computerInput = $rps[0];
    echo "COMPUTER: " . $computerInput . PHP_EOL;


    $userInput = readline("Rock, Paper, Scissors?: ");
    $userInput = strtolower($userInput);


    if ($userInput === $computerInput) {
        echo "It's a tie!" . PHP_EOL;
    } elseif ($userInput === "rock" && $computerInput === "scissors") {
        echo "You won! Computer picked {$computerInput}" . PHP_EOL;
    } elseif ($userInput === "paper" && $computerInput === "rock") {
        echo "You won! Computer picked {$computerInput}" . PHP_EOL;
    } elseif ($userInput === "scissors" && $computerInput === "paper") {
        echo "You won! Computer picked {$computerInput}" . PHP_EOL;
    } else {
        echo "You lost! Computer picked {$computerInput}" . PHP_EOL;
    }

    $playAgain = readline("Play again? (y / n): ");
    if ($playAgain !== "y") {
        exit;
    }

}


