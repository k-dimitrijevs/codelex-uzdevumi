<?php

class Application
{
    private WeaponStore $guns;

    public function __construct(WeaponStore $guns)
    {
        $this->guns = $guns;
    }

    public function run(): void
    {
        echo "------ List of available weapons ------" . PHP_EOL;
        foreach ($this->guns->getWeaponList() as $weapon) {
            echo "{$weapon->getWeapon()->getName()} | EUR {$weapon->getPrice()} | Licence: {$weapon->getWeapon()->getLicence()}" . PHP_EOL;
            echo "Power: {$weapon->getWeapon()->getPower()} | Trajectory: {$weapon->getWeapon()->calculateTrajectory()}" . PHP_EOL;
            echo "------------------------------------------------------" . PHP_EOL;

        }
        $this->buy();
    }

    public function buy(): void
    {
        $select = readline("Enter weapons you want to buy: ");;
        foreach ($this->guns->getWeaponList() as $gun) {
            if ($gun->getWeapon()->getName() === $select)
            {
                echo "You bought {$gun->getWeapon()->getName()}! Tank you for your purchase!" . PHP_EOL;
                exit;
            }
        }
        echo "Sorry we don't have a gun named like that!" . PHP_EOL;
    }
}