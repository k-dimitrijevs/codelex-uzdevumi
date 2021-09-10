<?php

class BankAccount
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function showUserNameAndBalance(): string
    {
        if ($this->balance < 0)
        {
            $this->balance *= -1;
            return $this->name . ", -$" . number_format($this->balance, 2) . PHP_EOL;
        } else {
            return $this->name . ", $" . number_format($this->balance, 2) . PHP_EOL;
        }
    }
}

$ben = new BankAccount("Benson", 17.25);
$benNegative = new BankAccount("Benson", -17.5);

echo $ben->showUserNameAndBalance();
echo $benNegative->showUserNameAndBalance();