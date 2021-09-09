<?php

class StoreView
{
    private Buyer $buyer;
    //private Store $store;
    //private ?StoreItem $purchaseCar;

    public function __construct(Store $store, Buyer $buyer)
    {
        $this->store = $store;
        $this->buyer = $buyer;
    }

    public function setCarPurchase(Store $carList): void
    {
        $selector = (int) readline("Select which car you want to buy: ");
        $nameOfTheCar = $carList->getSpecificCar($selector)->getCarName()->getName();
        $priceOfTheCar = $carList->getSpecificCar($selector)->getPrice();

        if ($priceOfTheCar >= $this->buyer->getCurrentBalance())
        {
            $needMore = $priceOfTheCar - $this->buyer->getCurrentBalance();
            echo "You can't afford {$nameOfTheCar}! You are {$needMore}$ short" . PHP_EOL;
            exit;
        } else {
            $this->purchaseCar = $carList->getSpecificCar($selector);
            echo "Congratulations! You bought {$nameOfTheCar} for {$priceOfTheCar}$!" . PHP_EOL;
        }
    }
}