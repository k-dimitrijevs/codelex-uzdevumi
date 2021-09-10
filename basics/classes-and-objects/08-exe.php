<?php

class SavingsAccount
{
    private int $interestRate;
    private float $balance;
    private ?float $earnedInterest = 0;
    private ?float $withdrawn = 0;
    private ?float $deposited = 0;

    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function withdrawalAmount(float $amount): void
    {
        $this->balance -= $amount;
    }

    public function depositAmount(float $amount): void
    {
        $this->balance += $amount;
    }

    public function totalWithdrawal(float $amount): void
    {
        $this->withdrawn += $amount;
    }
    public function getTotalWithdrawal(): float
    {
        return $this->withdrawn;
    }

    public function totalDeposit(float $amount): void
    {
        $this->deposited += $amount;
    }
    public function getTotalDeposited(): float
    {
        return $this->deposited;
    }

    public function setInterestRate(int $interestRate): void
    {
        $this->interestRate = $interestRate;
    }

    public function calculateEarnedInterest(): void
    {
        $this->earnedInterest += $this->balance * $this->interestRate / 100 / 12;
    }

    public function getEarnedInterest(): float
    {
        return $this->earnedInterest;
    }

    public function monthlyInterest(): void
    {
        $this->balance += $this->balance * $this->interestRate / 100 / 12;
    }
}

$balance = (float) readline("How much money is in the account?: ");
$annualInterestRate = (int) readline("Enter the annual interest rate: ");
$timeOfAccount = (int) readline("How long has the account been opened? ");

$customerAccount = new SavingsAccount($balance);
$customerAccount->setInterestRate($annualInterestRate);

for ($i = 1; $i <= $timeOfAccount; $i++)
{
    $deposit = (float) readline("Enter amount deposited for month: {$i}: ");
    $customerAccount->depositAmount($deposit);
    $customerAccount->totalDeposit($deposit);
    $withdrawal = (float) readline("Enter amount withdrawn for {$i}: ");
    $customerAccount->withdrawalAmount($withdrawal);
    $customerAccount->totalWithdrawal($withdrawal);

    $customerAccount->calculateEarnedInterest();
    $customerAccount->monthlyInterest();
}

echo "Total deposited: $" . number_format($customerAccount->getTotalDeposited(), 2) . PHP_EOL;
echo "Total withdrawn: $" .  number_format($customerAccount->getTotalWithdrawal(), 2) . PHP_EOL;
echo "Interest earned: $" . number_format($customerAccount->getEarnedInterest(), 2) . PHP_EOL;
echo "Ending balance: $" . number_format($customerAccount->getBalance(), 2) . PHP_EOL;