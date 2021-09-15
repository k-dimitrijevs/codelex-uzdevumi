<?php declare(strict_types=1);

abstract class paymentCredentials
{
    abstract public function enterCredentials(): void;
}