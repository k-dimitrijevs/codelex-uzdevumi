<?php

class FuelGauge
{
    private int $currentFuel = 0;
    private int $maxFuel = 70;

    public function getMaxFuel(): int
    {
        return $this->maxFuel;
    }
    public function getFuel(): int
    {
        return $this->currentFuel;
    }

    public function incrementFuel(): int
    {
        return $this->currentFuel += 1;
    }
    public function decrementFuel(): int
    {
        return $this->currentFuel -= 1;
    }
}

class Odometer
{
    private int $mileage;
    private int $maxMileage = 999999;
    private int $milesDriven = 0;
    private FuelGauge $currentFuel;

    public function __construct(FuelGauge $currentFuel, int $mileage)
    {
        $this->currentFuel = $currentFuel;
        $this->mileage = $mileage;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function incrementMileage(): void
    {
        if ($this->mileage > $this->maxMileage)
        {
            $this->mileage = 0;
        } else {
            $this->mileage += 1;
        }

        if ($this->mileage % 10 === 0) {
            $this->currentFuel->decrementFuel();
        }
    }
}

$fuel = new FuelGauge();
$odometer = new Odometer($fuel, 500000);

$fuelAmount = (int) readline("How many litres you want to fill up? MAX: {$fuel->getMaxFuel()}: ");

if ($fuelAmount > $fuel->getMaxFuel() || $fuelAmount <= 0)
{
    echo "Invalid amount!" . PHP_EOL;
    exit;
}

for ($i = 1; $i <= $fuelAmount; $i++)
{
    $fuel->incrementFuel();
    echo "Filling up! {$fuel->getFuel()}" . PHP_EOL;
    usleep(100000);
}

$ready = readline("We are filled up! Are you ready? (yes/no): ");
if ($ready !== "yes")
{
    echo "CYA L8TR ALLIGATOR!" . PHP_EOL;
    exit;
}
echo "-------------------------------------" . PHP_EOL;
echo "LET'S GO! ";
sleep(1);
echo "-------------------------------------" . PHP_EOL;

while ($fuel->getFuel() > 0)
{
    $odometer->incrementMileage();

    echo "ODOMETER: {$odometer->getMileage()}" . PHP_EOL;
    echo "-------------------------------------" . PHP_EOL;
    echo "FUEL: {$fuel->getFuel()}L" . PHP_EOL;

    usleep(50000);
}