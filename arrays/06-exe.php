<?php

$listOfWords = ["house", "mouse", "trap", "cheese", "yellow", "color", "book", "random", "test", "hello", "world", "codelex"];

//Randomize words
shuffle($listOfWords);
$lettersHidden = [];
$word = $listOfWords[0];

$letters = str_split($word);

foreach ($letters as $letter) {
    $lettersHidden[] = "_";
}

$hiddenWord = implode(" ", $lettersHidden);
echo $hiddenWord . PHP_EOL;


$numOfGuesses = 10;
$misses = "";

while ($numOfGuesses > 0) {

    // Display congratulations if the word has been guessed
    if (strpos($hiddenWord, "_") === false) {
        echo "YOU GOT IT!" . PHP_EOL;
        exit;
    }

    $guess = readline("Guess the letter: ");

    // Check if guess is only 1 character long and is a letter
    if (strlen($guess) !== 1 || ctype_alpha($guess) !== true) {
        echo "\nINVALID INPUT\n";
        continue;
    } else {
        for ($i = 0; $i < count($letters); $i++) {
            if (($guess === $letters[$i])) {
                $lettersHidden[$i] = $guess;
            }
        }
        $hiddenWord = implode(' ', $lettersHidden);

        if (!in_array($guess, $letters)) {
            $numOfGuesses--;
            // var_dump($guess);
                $misses .= $guess . " ";
        }
    }

    echo "Remaining guesses: " . $numOfGuesses . PHP_EOL;
    echo "MISSES - " . $misses . PHP_EOL;
    echo "\n$hiddenWord\n";

    // Display message if player is out of guesses!
    if ($numOfGuesses === 0) {
        echo "You ran out of guesses! The hidden word was {$word}!" . PHP_EOL;
    }

}