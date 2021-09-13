<?php declare(strict_types=1);

/**
 * Ieroču veikals
 * Ieroči (dažādi)
 * Ieroču licences
 * Ierocim ir lodes lidojuma trajektorija
 * Katram ierocim trajektoriju rēķina citādāk.
 */

require_once "Weapon.php";
require_once "Glock.php";
require_once "AK47.php";
require_once "Lauznis.php";

$glock = new Glock('Glock-18', 500, "Pistol");
$ak47 = new AK47("AK-47", 2300, "Rifle");
$lauznis = new Lauznis("Lauznis", 20, "Urla");

echo "{$glock->getName()} | {$glock->getLicence()} | EUR {$glock->getPrice()} | {$glock->calculateTrajectory()}" . PHP_EOL;
echo "{$ak47->getName()} | {$ak47->getLicence()} | EUR {$ak47->getPrice()} | {$ak47->calculateTrajectory()}" . PHP_EOL;
echo "{$lauznis->getName()} | {$lauznis->getLicence()} | EUR {$lauznis->getPrice()} | {$lauznis->calculateTrajectory()}" . PHP_EOL;