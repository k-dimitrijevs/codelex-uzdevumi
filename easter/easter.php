<?php

/**
 * Sākumā piešķir noteiktu skaitu olu (ja zaudē -1 ola, ja uzvar +1)
 * Atrisināt iespējamību uzvarēt! (Start: 50/50, bet kādai var būt lielāka iespēja)
 *
 * Default - 50%
 * 2 new eggs - vienai 30% otrai 75%
 *
 * cinās ar abām pusēm:
 *      2 : 0 - +1 un -1
 *      1 : 1 - abiem -1
 *
 *  1 ola - 80 / 90
 *  2 ola - 50 / 20
 *
 * random = 80 + 50 = 130 / 90 + 20 = 110
 * 1 ola: 1-80 / 1-90
 * 2 ola: 81-130 / 91-110
 */

function createEgg(string $name, int $power, int $quantity): stdClass
{
    $egg = new stdClass();
    $egg->name = $name;
    $egg->power = $power;
    $egg->quantity = $quantity;

    return $egg;
}

$playerEggs = [
    createEgg('PlayerEgg1', 50, 2),
    createEgg('PlayerEgg2', 40, 3),
    createEgg('PlayerEgg3', 60, 1)
];

$pcEggs = [];

for ($i = 0; $i < 3; $i++)
{
    $power = rand(20, 70);
    $quantity = rand(1, 3);
    $pcEggs[] = createEgg('PcEgg' . $i, $power, $quantity);
}

echo "---------------- PLAYER EGGS ----------------" .PHP_EOL;
foreach ($playerEggs as $playerEgg) {
    echo "NAME: {$playerEgg->name} | POWER: {$playerEgg->power} | QUANTITY: {$playerEgg->quantity}" . PHP_EOL;
}

echo "------------------ PC EGGS ------------------" .PHP_EOL;
foreach ($pcEggs as $pcEgg) {
    echo "NAME: {$pcEgg->name} | POWER: {$pcEgg->power} | QUANTITY: {$pcEgg->quantity}" . PHP_EOL;
}

echo "******************* BATTLE *******************" . PHP_EOL;

while (true)
{
    if (count($playerEggs) <= 0 || count($pcEggs) <= 0) break;

    $playerEgg = $playerEggs[array_rand($playerEggs)];
    $pcEgg = $pcEggs[array_rand($pcEggs)];

    $totalPower = $playerEgg->power + $pcEgg->power;

    echo "{$playerEgg->name} (P:{$playerEgg->power}) || VERSUS || {$pcEgg->name} (P:{$pcEgg->power})" . PHP_EOL;

    $pcWins = 0;
    $playerWins = 0;
    for ($j = 0; $j < 2; $j++)
    {
        $randomNum = rand(1, $totalPower);
        echo "RANDOM NUMBER: {$randomNum}" . PHP_EOL;

        if ($randomNum <= $playerEgg->power)
        {
            $playerWins++;
        } else {
            $pcWins++;
        }
    }

    if ($playerWins === $pcWins)
    {
        echo "It's a tie! You both lose and egg!" . PHP_EOL;
        if ($pcEgg->quantity <= 0)
        {
            // delete from array
            unset($pcEggs[array_search($pcEgg, $pcEggs)]);
        } else {
            $pcEgg->qauntity -= 1;
        }

        if ($playerEgg->quantity <= 0)
        {
            // delete from array
            unset($playerEggs[array_search($playerEgg, $playerEggs)]);
        } else {
            $playerEgg->qauntity -= 1;
        }

    } elseif ($playerWins > $pcWins) {
        echo "PLAYER WON!" . PHP_EOL;
        $existed = false;
        foreach ($playerEggs as $pg)
        {
            if ($pg->name === $pcEgg->name)
            {
                $existed = true;
                $pg->quantity++;
            }
        }

        if ($existed === false) {
            $e = clone $pcEgg;
            $e->quantity = 1;
            $playerEggs[] = $e;
        }

        $pcEgg->quantity -= 1;

        if ($pcEgg->quantity <= 0)
        {
            // delete from array
            unset($pcEggs[array_search($pcEgg, $pcEggs)]);
        }
    } else {
        echo "PC WON!" . PHP_EOL;
        $existed = false;
        foreach ($pcEggs as $pcg)
        {
            if ($pcg->name === $playerEgg->name)
            {
                $existed = true;
                $pcg->quantity++;
            }
        }

        if ($existed === false) {
            $epc = clone $playerEgg;
            $epc->quantity = 1;
            $pcEggs[] = $epc;
        }
        $playerEgg->quantity -= 1;

        if ($playerEgg->quantity <= 0)
        {
            // delete from array
            unset($playerEggs[array_search($playerEgg, $playerEggs)]);
        }
    }

    echo "---------------- PLAYER EGGS ----------------" .PHP_EOL;
    foreach ($playerEggs as $playerEgg) {
        echo "NAME: {$playerEgg->name} | POWER: {$playerEgg->power} | QUANTITY: {$playerEgg->quantity}" . PHP_EOL;
    }

    echo "------------------ PC EGGS ------------------" .PHP_EOL;
    foreach ($pcEggs as $pcEgg) {
        echo "NAME: {$pcEgg->name} | POWER: {$pcEgg->power} | QUANTITY: {$pcEgg->quantity}" . PHP_EOL;
    }

    echo "---------------------------------------" . PHP_EOL;
    $fightAgain = readline("Enter 'yes' if you wish to fight again: ");
    echo "---------------------------------------" . PHP_EOL;
    if ($fightAgain !== 'yes' || empty($playerEggs) || empty($pcEggs))
    {
        echo "BYE!" . PHP_EOL;
        exit;
    }
}