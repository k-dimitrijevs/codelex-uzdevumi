<?php declare(strict_types=1);

class Lauznis extends Weapon
{
    public function __construct(string $weaponName, int $price, string $licence)
    {
        parent::__construct($weaponName, $price, $licence);
    }

    public function calculateTrajectory(): string
    {
        return "Unlimited";
    }
}