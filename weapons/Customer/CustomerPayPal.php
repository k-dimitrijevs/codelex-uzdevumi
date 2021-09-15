<?php
require_once "paymentCredentials.php";

class CustomerPayPal extends paymentCredentials
{
    private string $paymentName;
    private string $email;
    private string $password;
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
        $this->email = trim(readline('Enter Paypal email address : ')) . PHP_EOL;
        $this->password = trim(readline('Enter Paypal password : ')) . PHP_EOL;;
    }
}