<?php declare(strict_types=1);

class AK47 extends Weapon
{
    public function calculateTrajectory(): string
    {
        return number_format((($this->getPower() * 13 + 89) / 9), 2);
    }
}