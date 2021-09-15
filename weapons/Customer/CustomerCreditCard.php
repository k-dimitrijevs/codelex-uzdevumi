<?php

class CustomerCreditCard
{
    private string $paymentName;
    private string $cardNumber;
    private int $cvv;
    private float $balance;

    public function __construct(string $paymentName, string $cardNumber, int $cvv, float $balance)
    {
        $this->paymentName = $paymentName;
        $this->cardNumber = $cardNumber;
        $this->cvv = $cvv;
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
}