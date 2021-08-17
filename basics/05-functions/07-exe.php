<?php

/*
 * Exercise 7**
 * Imagine you own a gun store.
 * Only certain guns can be purchased with license types.
 * Create an object (person) that will be the requester to purchase a gun (object)
 * Person object has a name, valid licenses (multiple) & cash.
 * Guns are objects stored within an array. Each gun has license letter, price & name.
 * Using PHP in-built functions determine if the requester (person) can buy a gun from the store.
 */
echo "-----EXERCISE 7**-----" . PHP_EOL;

$steven = new stdClass();
$steven->name = "Steven";
$steven->surname = "Jenkins";
$steven->licenses = ["A", "C", "D"];
$steven->cash = 8920;


$smallGun = new stdClass();
$smallGun->license = "A";
$smallGun->price = 1200;
$smallGun->name = "Really Small Gun";

$biggerGun = new stdClass();
$biggerGun->license = "B";
$biggerGun->price = 1900;
$biggerGun->name = "A little bit bigger gun";

$bigGun = new stdClass();
$bigGun->license = "C";
$bigGun->price = 4500;
$bigGun->name = "Kind of a Big Gun";

$hugeGun = new stdClass();
$hugeGun->license = "D";
$hugeGun->price = 9999;
$hugeGun->name = "Just HUGE GUN";

$guns = [$smallGun, $biggerGun, $bigGun, $hugeGun];

foreach ($guns as $key => $gun)
{
    echo "{$key} | {$gun->name} ({$gun->price}$) [{$gun->license}]"  . PHP_EOL;
}

$selection = (int) readline('Enter selection: ');

if (!isset($guns[$selection]))
{
    echo "Invalid selection";
    exit;
}


$selectedWeapon = $guns[$selection];

if(!in_array($selectedWeapon->license, $steven->licenses) && $steven->cash < $selectedWeapon->price)
{
    echo "Person cannot purchase this weapon.";
    exit;
}

echo "Person can purchase this {$selectedWeapon->name};" . PHP_EOL;