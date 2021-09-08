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

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getCarName(): string
    {
        return $this->car->getName();
    }

    public function getCar(): string
    {
        return "{$this->car->getName()} | {$this->car->getYear()} | {$this->getPrice()}";
    }
}