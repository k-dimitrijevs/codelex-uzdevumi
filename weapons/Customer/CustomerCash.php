<?php

class CustomerCash
{
    private string $paymentName;
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
}