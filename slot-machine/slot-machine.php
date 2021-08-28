<?php

/**
 * SLOT MACHINE 4x3
 *
 * Possible winning scenarios:
 *      Horizontal lines;
 *      Diagonals:
 *          A A - -         - - A A
 *          - - A -         - A - -
 *          - - - A         A - - -
 *
 *          A - - -         - - - A
 *          - A - -         - - A -
 *          - - A A         A A - -
 */

$board = [
    [],
    [],
    []
];

$rows = 3;
$columns = 4;

$payout = [
    "A" => 10,
    "B" => 20,
    "C" => 30,
    "D" => 40
];

$bets = [
    1 => 10,
    2 => 20,
    3 => 40,
    4 => 80,
    5 => 160
];

$symbols = array_keys($payout);


function spin() {
    global $board, $rows, $columns, $symbols;
    for ($r = 0; $r < $rows; $r++)
    {
        for ($c = 0; $c < $columns; $c++)
        {
            $board[$r][$c] = $symbols[array_rand($symbols)];
        }
    }

    foreach ($board as $row)
    {
        foreach ($row as $symbol)
        {
            echo $symbol . " ";
        }
        echo PHP_EOL;
    }

}

$conditions = [
    [
        [0, 0], [0, 1], [0, 2], [0, 3]
    ],
    [
        [1, 0], [1, 1], [1, 2], [1, 3]
    ],
    [
        [2, 0], [2, 1], [2, 2], [2, 3]
    ],
    [
        [0, 0], [0, 1], [1, 2], [2, 3]
    ],
    [
        [2, 0], [2, 1], [1, 2], [0, 3]
    ],
    [
        [2, 0], [1, 1], [0, 2], [0, 3]
    ],
    [
        [0, 0], [1, 1], [2, 2], [2, 3]
    ]
];

$playerCredits = (int) readline("Enter your balance: ");
$spinAgain = 1;
$winnings = 0;

while ($spinAgain === 1)
{
    $playerBet = (int) readline("Enter your bet (" . implode(", ", $bets) . "): ");
    $coefficient = array_search($playerBet, $bets);

    if (!in_array($playerBet, $bets)) {
        echo "Invalid bet!" . PHP_EOL;
        continue;
    }

    echo "You spin for {$playerBet}." . PHP_EOL;
    spin();
    $playerCredits -= $playerBet;

    foreach ($conditions as $condition)
    {
        $x = [];
        foreach ($condition as $positions)
        {
            $row = $positions[0];
            $column = $positions[1];

            $x[] = $board[$row][$column];
        }

        if (count(array_unique($x)) == 1)
        {
            $winnings = $payout[$x[0]] * $coefficient;
            $playerCredits += $winnings;
            echo "You won {$winnings}." . PHP_EOL;
        }
    }

    echo "Remaining balance: {$playerCredits}" . PHP_EOL;

    if ($playerCredits <= 0) {
        echo "You ran out of credits!" . PHP_EOL;
        exit;
    }

    $spinAgain = (int) readline("Spin Again? (1 for YES 0 for NO ): ");
    if ($spinAgain !== 1) {
        echo "You stopped playing with {$playerCredits} credits" . PHP_EOL;
        echo "Bye!" . PHP_EOL;
    }
}