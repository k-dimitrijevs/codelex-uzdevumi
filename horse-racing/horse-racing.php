<?php

/**
 * Ievade - cik spēlētāju
 * Katram spēlētājam piešķirtam unikālu simolu vai skaitli, vai burtu.
 *
 * _ - 1 vienība
 *
 * # _ _ _ _ _ _
 * * _ _ _ _ _ _
 * 1 _ _ _ _ _ _
 *
 * Katrs speļētājs 1 sekundes laikā pakustas no 1-2 vienībām - sleep(1)
 * Izdrukāam tabuliņu ar spēlētāju rezultātiem/vietām.
 *
 */

while (true) {
    $numOfHorses = (int)readline("Provide number of players that will race (max - 10): ");
    if ($numOfHorses < 1 || $numOfHorses > 10) {
        echo "Invalid number of players! Try Again!" . PHP_EOL;
    } else {
        break;
    }
}

$player = new stdClass();
$player->balance = 500;
$player->bets = [];

$horses = range("A", "J");
$trackLen = 15;
$fieldTrack = [];


for ($i = 1; $i <= $numOfHorses; $i++) {
    $runnerTrack = [];
    for ($j = 1; $j <= $trackLen; $j++) {
        $runnerTrack[] = "_";
    }
    $fieldTrack[] = $runnerTrack;
}

$horseAndBet = [];

for ($i = 0; $i < $numOfHorses; $i++) {
    $fieldTrack[$i][0] = $horses[$i];
    //array_push($horseAndBet, [$horses[$i] => rand(1, 7)]);
    $horseAndBet[] = [$horses[$i] => rand(1, 8)];

}

echo "------------ HORSES AND COEFFICIENTS ------------" . PHP_EOL;
foreach ($horseAndBet as $key => $hab)
{
    foreach($hab as $keyNext => $value)
    {
        echo "NAME: {$keyNext}  ||  COEFFICIENT: {$value}" . PHP_EOL;
    }
}

echo "-------------------------------------------------" . PHP_EOL;

while (true) {
    echo "YOUR BALANCE: {$player->balance}" . PHP_EOL;
    $betHorse = readline("Choose a horse to bet on: ");
    for ($i = 0; $i < $numOfHorses; $i++) {
        $fieldTrack[$i][0] = $horses[$i];
        if ($betHorse !== $horses[$i]) {
            $msg = "Horse doesn't exist!" . PHP_EOL;
            continue;
        } else {
            $msg = "Horse selected!" . PHP_EOL;
            $betAmount = (int) readline("Enter bet amount: ");
            if ($betAmount > $player->balance) {
                $msg = "Not enough money!" . PHP_EOL;
            } else {
                $msg = "Bet placed on {$betHorse}!" . PHP_EOL;
                $player->balance -= $betAmount;
                $player->bets[$betHorse] = $betAmount;
            }
        }
        break;
    }
    echo $msg . PHP_EOL;

    $betAgain = readline("Bet again? (y/n): ");
    if ($betAgain !== "y") {
        break;
    }
}

echo "------------ LET'S GO ------------" . PHP_EOL;

foreach ($fieldTrack as $runnerLine) {
    foreach ($runnerLine as $length) {
        echo $length;
    }
    echo PHP_EOL;
}
echo PHP_EOL;

$move = 0;
$winners = [];

while (count($winners) < $numOfHorses) {

    sleep(1);
    for ($i = 0; $i < $numOfHorses; $i++) {
        $move = rand(1, 2);


        if ($fieldTrack[$i][$trackLen - 1] !== "_") {
            if (!in_array($fieldTrack[$i][$trackLen - 1], $winners)) {
                $winners[] = $fieldTrack[$i][$trackLen - 1];
            }
            continue;
        } elseif ($fieldTrack[$i][$trackLen - 2] !== "_") {
            $move = 1;
        }

        if ($move === 1) {
            array_pop($fieldTrack[$i]);
            array_unshift($fieldTrack[$i], "_");
        } else {
            array_pop($fieldTrack[$i]);
            array_pop($fieldTrack[$i]);
            array_unshift($fieldTrack[$i], "_", "_");
        }
    }
    foreach ($fieldTrack as $runnerLine) {
        foreach ($runnerLine as $length) {
            echo $length;
        }
        echo PHP_EOL;
    }
    echo PHP_EOL;
}

echo "Results: " . PHP_EOL;
for ($i = 1; $i <= $numOfHorses; $i++) {
    if ($i === 1 || $i === 21) {
        echo $i . "st place: " . $winners[$i - 1] . PHP_EOL;
    } elseif ($i === 2 || $i === 22) {
        echo $i . "nd place: " . $winners[$i - 1] . PHP_EOL;
    } elseif ($i === 3 || $i === 23) {
        echo $i . "rd place: " . $winners[$i - 1] . PHP_EOL;
    } else {
        echo $i . "th place: " . $winners[$i - 1] . PHP_EOL;
    }
}

$winnings = 0;
echo "Horse {$winners[0]} won the race!" . PHP_EOL;
foreach ($player->bets as $key => $bet) {
    if ($winners[0] === $key) {
        foreach ($horseAndBet as $item) {
            foreach ($item as $test => $i) {
                if ($test === $key) {
                    $winnings = $player->bets[$key] * $i;
                    echo "You won! Your winnings are {$winnings}$" . PHP_EOL;
                }
            }
        }
    }
}
