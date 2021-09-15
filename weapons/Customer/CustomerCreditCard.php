<?php

class CustomerCreditCard extends paymentCredentials
{
    private string $paymentName;
    private string $cardNumber;
    private string $cvv;
    private float $balance;

    public function __construct(string $paymentName, float $balance)
    {
        $this->paymentName = $paymentName;
        $this->balance = $balance;
    }

    public function getPaymentName(): string
    {
        return $this->paymentName;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function enterCredentials(): void
    {
        $this->cardNumber = trim(readline('Enter credit card number: ')) . PHP_EOL;
        $this->cvv = trim(readline('Enter credit card cvv : ')) . PHP_EOL;;
    }
}