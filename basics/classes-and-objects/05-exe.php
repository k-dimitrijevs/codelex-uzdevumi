<?php

class Date
{
    private int $month;
    private int $day;
    private int $year;

    public function __construct(int $month, int $day, int $year)
    {
        $this->month = $month;
        $this->day = $day;
        $this->year = $year;
    }


    public function getMonth(): int
    {
        return $this->month;
    }
    public function getDay(): int
    {
        return $this->day;
    }
    public function getYear(): int
    {
        return $this->year;
    }

    public function setMonth(int $month): void
    {
        $this->month = $month;
    }
    public function setDay(int $day): void
    {
        $this->day = $day;
    }
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function displayDate(): string
    {
        return "{$this->getMonth()}/{$this->getDay()}/{$this->getYear()}";
    }
}

$date = new Date(9, 7, 2021);

echo $date->displayDate() . PHP_EOL;

$date->setDay(24);
echo $date->displayDate() . PHP_EOL;

$date->setMonth(12);
echo $date->displayDate() . PHP_EOL;

$date->setYear(2020);
echo $date->displayDate() . PHP_EOL;