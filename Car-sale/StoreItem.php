<?php

class StoreItem
{
    private Car $car;
    private int $price;

    public function __construct(Car $car, int $price)
    {
        $this->car = $car;
        $this->price = $price;
    }

    public function getCars(): string
    {
        return "CAR: {$this->car->getName()} | YEAR: {$this->car->getYear()} | PRICE: {$this->price}";
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}