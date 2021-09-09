<?php

class Buyer
{
    private int $balance;

    public function __construct(int $balance)
    {
        $this->balance = $balance;
    }

    public function getCurrentBalance(): int
    {
        return $this->balance;
    }
}