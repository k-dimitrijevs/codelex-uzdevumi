<?php

require_once "Car.php";
require_once "StoreItem.php";
require_once "Store.php"; // NOT USED YET
require_once "Buyer.php";

$cars = [
    new StoreItem(
        new Car('Audi A6', 2008), 7500
    ),
    new StoreItem(
        new Car('BMW E61', 2009), 8000
    ),
    new StoreItem(
        new Car('Honda Civic', 1994), 800
    ),
    new StoreItem(
        new Car('Volkswagen Passat(B6)', 2005), 3400
    ),
    new StoreItem(
        new Car('Volvo 940', 1991), 2400
    ),
];

//$store = new Store($cars);

$buyer = new Buyer(6000);
echo "Your balance: {$buyer->getBalance()}$" . PHP_EOL;


foreach ($cars as $key => $car) {
    echo "[$key] {$car->getCars()}" . PHP_EOL;
}

$selectCar = (int) readline("Select witch car you want to buy: ");

foreach ($cars as $key => $car) {
    if ($selectCar === $key)
    {
        if ($buyer->getBalance() >= $car->getPrice())
        {
            $msg = "You bought " . $car->getCars() . PHP_EOL;
        } else {
            $msg = "You can't afford " . $car->getCars() . PHP_EOL;
        }
        break;
    } else {
        $msg = "Invalid input!" . PHP_EOL;
    }
}
echo $msg;


//if ($buyer->getBalance() >= $car->getPrice())
//{
//    echo "[$key] You can afford: " . $car->getCars() . PHP_EOL;
//}




