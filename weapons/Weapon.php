<?php declare(strict_types=1);

class Weapon
{
    private string $weaponName;
    private int $price;
    private string $licence;

    public function __construct(string $weaponName, int $price, string $licence)
    {
        $this->weaponName = $weaponName;
        $this->price = $price;
        $this->licence = $licence;
    }

    public function getName(): string
    {
        return $this->weaponName;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getLicence(): string
    {
        return $this->licence;
    }

    public function calculateTrajectory(): string
    {
        return number_format(((1 * 1 + 1) / 1), 2);
    }
}