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
require_once "WepAndPrice.php";
require_once "WeaponStore.php";
require_once "Application.php";

require_once "Customer/CustomerPayPal.php";
require_once "Customer/CustomerCreditCard.php";
require_once "Customer/CustomerGooglePay.php";
require_once "Customer/Payments.php";

$store = new Application(new WeaponStore(
    [
        new WepAndPrice(new Glock("Glock-18", "Pistol", "250"), 1500),
        new WepAndPrice(new AK47("AK-47", "Rifle", "1000"), 7500),
        new WepAndPrice(new Lauznis("Lauznis", "Rajons", "5000"), 10)
    ]
    ),
    new Payments(
        new CustomerGooglePay("Google Pay", 65),
        new CustomerCreditCard("Credit Card", 12000),
        new CustomerPayPal("PayPal", 2000)
    )
);

$store->run();