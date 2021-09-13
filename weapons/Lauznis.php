<?php declare(strict_types=1);

class Lauznis extends Weapon
{
    public function calculateTrajectory(): string
    {
        return number_format(($this->getPower() * 1000000000), 2);
    }
}