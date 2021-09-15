<?php

class Payments
{
    private array $payments = [];

    public function __construct(CustomerCash $cash, CustomerCreditCard $creditCard, CustomerPayPal $paypal)
    {
        $this->payments = [$cash, $creditCard, $paypal];
    }

    public function getPayments(): array
    {
        return $this->payments;
    }
}