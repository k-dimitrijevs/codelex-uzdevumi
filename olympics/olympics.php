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
    $numOfPlayers = (int) readline("Provide number of players that will race (max - 26): ");
    if ($numOfPlayers < 1 || $numOfPlayers > 26) {
        echo "Invalid number of players! Try Again!" . PHP_EOL;
    } else {
        break;
    }
}

$players = range("A", "Z");
$trackLen = 10;
$fieldTrack = [];

for ($i = 1; $i <= $numOfPlayers; $i++) {
    $runnerTrack = [];
    for ($j = 1; $j <= $trackLen; $j++) {
        $runnerTrack[] = "_";
    }
    $fieldTrack[] = $runnerTrack;
}


for ($i = 0; $i < $numOfPlayers; $i++) {
    $fieldTrack[$i][0] = $players[$i];
}

foreach ($fieldTrack as $runnerLine) {
    foreach ($runnerLine as $length) {
        echo $length;
    }
    echo PHP_EOL;
}

$move = 0;
$winners = [];

while (count($winners) < $numOfPlayers) {

    sleep(1);
    for ($i = 0; $i < $numOfPlayers; $i++) {
        $move = rand(1, 2);


        if ($fieldTrack[$i][$trackLen-1] !== "_") {
            if (!in_array($fieldTrack[$i][$trackLen-1], $winners)) {
                $winners[] = $fieldTrack[$i][$trackLen-1];
            }
            continue;
        } elseif ($fieldTrack[$i][$trackLen-2] !== "_") {
            $move = 1;
        }

        if ($move === 1) {
            array_pop($fieldTrack[$i]);
            array_unshift($fieldTrack[$i], "_");
        } else {
            array_pop($fieldTrack[$i]);
            array_pop($fieldTrack[$i]);
            array_unshift($fieldTrack[$i], "_" , "_");
        }
    }
    foreach ($fieldTrack as $runnerLine) {
        foreach ($runnerLine as $length) {
            echo $length;
        }
        echo PHP_EOL;
    }
}

echo "Results: " . PHP_EOL;
for ($i = 1; $i <= $numOfPlayers; $i++) {
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