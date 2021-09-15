<?php

class CustomerGooglePay
{
    private string $paymentName;
    private $phoneNumber;
    private $code;
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
        $this->phoneNumber = trim(readline('Enter your phone number: ')) . PHP_EOL;
        $this->code = trim(readline('Enter confirmation code : ')) . PHP_EOL;;
    }
}