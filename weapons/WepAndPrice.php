<?php

class WepAndPrice
{
    private Weapon $weapon;
    private int $price;

    public function __construct(Weapon $weapon, int $price)
    {
        $this->weapon = $weapon;
        $this->price = $price;
    }

    public function getWeapon(): Weapon
    {
        return $this->weapon;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}