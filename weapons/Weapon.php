<?php declare(strict_types=1);

class Weapon
{
    private string $weaponName;
    private string $licence;
    private string $power;


    public function __construct(string $weaponName, string $licence, string $power)
    {
        $this->weaponName = $weaponName;
        $this->licence = $licence;
        $this->power = $power;

    }

    public function getName(): string
    {
        return $this->weaponName;
    }

    public function getPower(): string
    {
        return $this->power;
    }

    public function getLicence(): string
    {
        return $this->licence;
    }

    public function calculateTrajectory(): string
    {
        return number_format((($this->power * 13 + 4) / 12), 2);
    }
}