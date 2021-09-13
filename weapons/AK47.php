<?php declare(strict_types=1);

class AK47 extends Weapon
{
    public function __construct(string $weaponName, int $price, string $licence)
    {
        parent::__construct($weaponName, $price, $licence);
    }

    public function calculateTrajectory(): string
    {
        return number_format(((67 * 13 + 89) / 15), 2);
    }
}