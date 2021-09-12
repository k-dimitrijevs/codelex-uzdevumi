<?php

class Account
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function deposit(float $amount): void
    {
        $this->balance += $amount;
    }

    public function withdraw(float $amount): void
    {
        $this->balance -= $amount;
    }

    public function transfer(Account $to, int $howMuch)
    {
        $this->withdraw($howMuch);
        $to->deposit($howMuch);
    }

    public function showAccountDetails(): string
    {
        $showBalance = number_format($this->balance, 2);
        return "ACCOUNT: $this->name || BALANCE: $$showBalance" . PHP_EOL;
    }
}

$bartosAccount = new Account("Barto's account", 100.00);
$bartosSwissAccount = new Account("Barto's account in Switzerland", 1000000.00);

echo "Initial state" . PHP_EOL;
echo $bartosAccount->showAccountDetails();
echo $bartosSwissAccount->showAccountDetails();

echo "-------------------------------------" . PHP_EOL;
$bartosAccount->withdraw(20);
echo "Barto's account balance is now: " . number_format($bartosAccount->getBalance(), 2) . PHP_EOL;
$bartosSwissAccount->deposit(200);
echo "Barto's Swiss account balance is now: " . number_format($bartosSwissAccount->getBalance(), 2) . PHP_EOL;

echo "-------------------------------------" . PHP_EOL;
echo "Final state" . PHP_EOL;
echo $bartosAccount->showAccountDetails();
echo $bartosSwissAccount->showAccountDetails();

echo "------------------- TRANSFERS ---------------------" . PHP_EOL;

$johnsAccount = new Account("John's account", 253);
$janesAccount = new Account("Jane's account", 500.23);
$mikesAccount = new Account("Mike's account", 0);

echo $johnsAccount->showAccountDetails();
echo $janesAccount->showAccountDetails();
echo $mikesAccount->showAccountDetails();

echo "---------------------------------------------------" . PHP_EOL;

$johnsAccount->transfer($janesAccount, 50);
$janesAccount->transfer($mikesAccount, 25);

echo "-------------------- FINAL -----------------------" . PHP_EOL;

echo $johnsAccount->showAccountDetails();
echo $janesAccount->showAccountDetails();
echo $mikesAccount->showAccountDetails();