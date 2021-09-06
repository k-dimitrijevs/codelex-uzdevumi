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
        $msg = "{$this->name}, price {$this->price}, amount {$this->amount}" . PHP_EOL;
        return $msg;
    }


    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

}

$products = [
    (new Product('Logitech mouse', 70, 14)),
    (new Product('iPhone 5s', 999.99, 3)),
    (new Product('Epson EB-UO5', 440.46, 1)),

];

foreach ($products as $product) {
    echo $product->printProduct();
}
echo PHP_EOL;

$products[0]->setPrice(110);
$products[2]->setAmount(23);

foreach ($products as $product) {
    echo $product->printProduct();
}