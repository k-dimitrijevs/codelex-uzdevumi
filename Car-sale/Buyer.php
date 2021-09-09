<?php

class Buyer
{
    private string $client;
    private int $balance;
    private ?StoreItem $purchaseCar;

    public function __construct(string $client, int $balance)
    {
        $this->client = $client;
        $this->balance = $balance;
    }

    public function setCarPurchase(Store $carList): void
    {
            $selector = (int) readline("Select which car you want to buy: ");
            $nameOfTheCar = $carList->getSpecificCar($selector)->getCarName()->getName();
            $priceOfTheCar = $carList->getSpecificCar($selector)->getPrice();

            if ($priceOfTheCar >= $this->balance)
            {
                $needMore = $priceOfTheCar - $this->balance;
                echo "You can't afford {$nameOfTheCar}! You are {$needMore}$ short" . PHP_EOL;
                exit;
            } else {
                $this->purchaseCar = $carList->getSpecificCar($selector);
                echo "Congratulations! You bought {$nameOfTheCar} for {$priceOfTheCar}$!" . PHP_EOL;
            }
    }

    public function getPurchaseCar(): ?StoreItem
    {
        return $this->purchaseCar;
    }

    public function getNewBalance(): int
    {
        return $this->balance -= $this->purchaseCar->getPrice();
    }
}