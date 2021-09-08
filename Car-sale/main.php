<?php

require_once "Car.php";
require_once "StoreItem.php";
require_once "Store.php";

require_once "Buyer.php";

$store = new Store([
    new StoreItem(
        new Car('Audi', 2018), 28000
    ),
    new StoreItem(
        new Car('BMW', 2020), 35000
    ),
    new StoreItem(
        new Car('Honda', 2015), 14000
    ),
    new StoreItem(
        new Car('Volkswagen', 2017), 16000
    ),
    new StoreItem(
        new Car('Volvo', 2021), 45000
    )
]);

$buyer = new Buyer(30000);
echo "Your balance {$buyer->getBalance()}$" . PHP_EOL;

foreach ($store->getItems() as $key => $item) {
    echo "[{$key}] |  {$item->getCar()}$" . PHP_EOL;
}