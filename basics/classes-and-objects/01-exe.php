<?php

class Product
{
    private string $name;
    private float $price;
    private int $amount;

    public function __construct(string $name, float $price, int $amount)
    {
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
    }

    public function printProduct(): string
    {
        return "{$this->name}, price {$this->price}$, amount {$this->amount}" . PHP_EOL;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    public function applyDiscount(int $percent): void
    {
        $this->setPrice($this->getPrice() * (1 - ($percent / 100)));
    }
}

$products = [
    new Product('Logitech mouse', 70.00, 14),
    new Product('iPhone 5s', 999.99, 3),
    new Product('Epson EB-UO5', 440.46, 1),

];

foreach ($products as $product) {
    echo $product->printProduct();
}
echo PHP_EOL;

$products[0]->setPrice(89.99);
$products[0]->setAmount(3);

$products[2]->setPrice(376.99);
$products[2]->setAmount(23);

foreach ($products as $product) {
    $product->applyDiscount(30);
}

foreach ($products as $product) {
    echo $product->printProduct();
}