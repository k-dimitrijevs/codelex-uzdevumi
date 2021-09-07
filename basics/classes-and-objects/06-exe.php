<?php

class Survey
{
    private int $surveyed;
    private float $purchasedEnergyDrinks;
    private float $preferCitrusDrinks;

    public function __construct(int $surveyed, float $purchasedEnergyDrinks, float $preferCitrusDrinks)
    {
        $this->surveyed = $surveyed;
        $this->purchasedEnergyDrinks = $purchasedEnergyDrinks;
        $this->preferCitrusDrinks = $preferCitrusDrinks;
    }

    public function getSurveyed(): int
    {
        return $this->surveyed;
    }
    public function getPurchasedED(): float
    {
        return $this->purchasedEnergyDrinks;
    }
    public function getPreferCitrus(): float
    {
        return $this->preferCitrusDrinks;
    }


    public function calculateEnergyDrinkers(): int
    {
        return $this->getSurveyed() * $this->getPurchasedED();
    }

    public function calculatePreferCitrus(): int
    {
        return $this->calculateEnergyDrinkers() * $this->getPreferCitrus();
    }
}

$edSurvey = new Survey(12467, 0.14, 0.64);

echo "Total number of people surveyed: {$edSurvey->getSurveyed()}" . PHP_EOL;
echo "Approximately {$edSurvey->calculateEnergyDrinkers()} bought at least one energy drink" . PHP_EOL;
echo "{$edSurvey->calculatePreferCitrus()} of those prefer citrus flavored energy drinks" . PHP_EOL;

/*
fixme
echo "Total number of people surveyed " . $surveyed;
echo "Approximately " . ? . " bought at least one energy drink";
echo ? . " of those " . "prefer citrus flavored energy drinks.";
*/