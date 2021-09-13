<?php declare(strict_types=1);

class Glock extends Weapon
{
    public function calculateTrajectory(): string
    {
        return number_format((($this->getPower() * 8 + 24) / 18), 2);

    }
}