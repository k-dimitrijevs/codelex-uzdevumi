<?php declare(strict_types=1);

class Glock extends Weapon
{
    public function __construct(string $weaponName, int $price, string $licence)
    {
        parent::__construct($weaponName, $price, $licence);
    }

    public function calculateTrajectory(): string
    {
        return number_format(((12 * 8 + 24) / 4), 2);
    }
}