<?php

class Store
{
    private array $availableCars = [];
    private int $income = 0;

    public function __construct(array $availableCars)
    {
        foreach ($availableCars as $availableCar) {
            $this->add($availableCar);
        }
    }

    private function add(StoreItem $availableCar): void
    {
        $this->availableCars[] = $availableCar;
    }

    public function getAvailableCars(): array
    {
        return $this->availableCars;
    }

    public function showAvailableCars(): void
    {
        foreach ($this->getAvailableCars() as $key => $availableCar) {
            $selector = $key;
            echo "[{$selector}] | {$availableCar->getCarName()->getName()} | {$availableCar->getCarName()->getYear()} | {$availableCar->getPrice()}$" . PHP_EOL;
        }
    }

    public function getSpecificCar($selector): StoreItem
    {
        return $this->availableCars[$selector];
    }

    public function setIncome(Buyer $customer): void
    {
        $this->income += $customer->getPurchaseCar()->getPrice();
    }
    public function getIncome(): string
    {
        return "Store's income: {$this->income}$" . PHP_EOL;
    }
}