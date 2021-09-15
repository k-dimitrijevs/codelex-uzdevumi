<?php

class CustomerPayPal
{
    private string $paymentName;
    private string $email;
    private string $password;
    private float $balance;

    public function __construct(string $paymentName, string $email, string $password, float $balance)
    {
        $this->paymentName = $paymentName;
        $this->email = $email;
        $this->password = $password;
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