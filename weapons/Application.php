<?php

class Application
{
    private WeaponStore $guns;
    private Payments $payments;

    public function __construct(WeaponStore $guns, Payments $payments)
    {
        $this->guns = $guns;
        $this->payments = $payments;
    }

    public function run(): void
    {
        echo "------ List of available weapons ------" . PHP_EOL;
        foreach ($this->guns->getWeaponList() as $weapon) {
            echo "{$weapon->getWeapon()->getName()} | EUR {$weapon->getPrice()} | Licence: {$weapon->getWeapon()->getLicence()}" . PHP_EOL;
            echo "Power: {$weapon->getWeapon()->getPower()} | Trajectory: {$weapon->getWeapon()->calculateTrajectory()}" . PHP_EOL;
        }
        echo PHP_EOL;

        echo "----------- Available payment methods ------------" . PHP_EOL;
        foreach ($this->payments->getPayments() as $key => $payment) {
            echo "PAYMENT: {$payment->getPaymentName()}" . PHP_EOL;
        }
        echo "--------------------------------------------------" . PHP_EOL;

        $selectMethod = readline("Select payment method by name: ");

        foreach ($this->payments->getPayments() as $payment)
        {
            $paymentMethod = $payment->getPaymentName();
            if ($paymentMethod === $selectMethod)
            {
                $customerBalance = $payment->getBalance();
                echo "SELECTED PAYMENT: {$payment->getPaymentName()} | BALANCE: EUR {$customerBalance}" . PHP_EOL;
                break;
            }
        }
        
        if ($paymentMethod !== $selectMethod)
        {
            echo "Invalid payment method" . PHP_EOL;
            exit;
        }

        $select = readline("Enter weapons you want to buy: ");;
        foreach ($this->guns->getWeaponList() as $gun) {
            if ($gun->getWeapon()->getName() === $select && $customerBalance >= $gun->getPrice())
            {
                echo "You bought {$gun->getWeapon()->getName()}! Tank you for your purchase!" . PHP_EOL;
                exit;
            }
        }
        echo "You can't afford this gun or the gun doesn't exist!" . PHP_EOL;
    }

}