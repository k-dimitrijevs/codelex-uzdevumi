<?php

/**
 * Nauda monētās - pie samaksāšanas jāiemet konkrētas monētas!
 * Ieliekot pareizu monētu - daudzums noņemas
 * 12 - NO GO
 * Ja iztērētā konkrētā monēta - NO GO
 * Ja ir pārmaksa, automātam arī ir jāizdod monētās!
 *
 *
 */

$customer = new stdClass();
$customer->wallet = [
    200 => 10,
    100 => 10,
    50 => 10,
    20 => 10,
    10 => 10,
    5 => 10,
    2 => 10,
    1 => 10
];

function createProduct(string $name, int $price): stdClass {
    $product = new stdClass();
    $product->name = $name;
    $product->price = $price;

    return $product;
}

$products = [
    createProduct("Coffee", 170),
    createProduct("Tea", 146),
    createProduct("Water", 49),
    createProduct("Sprite", 62),
    createProduct("Fanta", 65),
    createProduct("Coca-cola", 55)
];

echo "------------- VENDING MACHINE -------------" . PHP_EOL;
foreach ($products as $key => $product) {
    $price = $product->price / 100;
    echo "[{$key}] || {$product->name}  ||  {$price}$" . PHP_EOL;
}


while (true) {
    $selection = (int)readline("Select product: ");
    if (!isset($products[$selection])) {
        echo "Invalid input!" . PHP_EOL;
    } else {
        break;
    }
}

$selectedProduct = $products[$selection];
$insertedCoins = 0;

while ($insertedCoins < $selectedProduct->price) {
    echo "Total left to pay: " . ($selectedProduct->price - $insertedCoins) / 100 .  "$" . PHP_EOL;
    $coin = (int) readline("Insert coin: ");

    if (!in_array($coin, array_keys($customer->wallet))) {
        echo "Invalid coin!" . PHP_EOL;
        continue;
    }

    if (isset($customer->wallet[$coin]) && $customer->wallet[$coin] <= 0) {
        echo "Coin not found in your wallet!" . PHP_EOL;
        continue;
    }
    
    $customer->wallet[$coin] -= 1;

    $insertedCoins += $coin;
}

$exchange = $insertedCoins - $selectedProduct->price;

foreach (array_keys($customer->wallet) as $coinSize) {
    //var_dump($coinSize);
    $quantity = intdiv($exchange, $coinSize);
    $customer->wallet[$coinSize] += $quantity;
    $exchange -= $coinSize * $quantity;
}

echo "------------ Coins in wallet ------------" . PHP_EOL;
foreach ($customer->wallet as $key => $value) {
    $walletCoin = $key / 100;
    echo "COIN: {$walletCoin}$ || QUANTITY: $value" . PHP_EOL;
}