<?php

// Narvesen

/**
 * Preču katalogs - List of products
 * Pircējs - a simple object
 * Iepirkšanās grozs - array containing products + int [$x => 1, $y => 3, $c => 10]
 * Iepērkoties narvesenā pircējam jābūt iespējai ielikt 1 vai vairkākas preces grozā
 * Grozā var ielikt preces tik daudz, cik ir veikalā
 * Beigās iespēja veikt apmaksu par visu grozu - komanda ar kuras palīdzu var veikt apmaksu (pay)
 */

function createProduct(string $name, int $price, int $qty): stdClass {
    $product = new stdClass();
    $product->name = $name;
    $product->price = $price;
    $product->quantity = $qty;

    return $product;
}

$customer = new stdClass();
$customer->balance = 5000;

$products =
    [
        createProduct("Coffee", 200, 12),
        createProduct("Chocolate", 150, 7),
        createProduct("Apple juice", 250, 3),
        createProduct("Hot Dog", 100, 1),
        createProduct("Ice cream", 200, 8),
        createProduct("Soda", 70, 3)
    ];

$shoppingCart = [];
$total = 0;

$remainingBalance = $customer->balance / 100;

while (true) {
    echo "Product List:" . PHP_EOL;
    $amount = 0;

    foreach ($products as $key => $product) {
        $price = $product->price / 100;
        echo "[$key] Name: {$product->name} Price: {$price}$ Quantity: {$product->quantity}" . PHP_EOL;
    }

    $selectedProduct = (int) readline("What do you want to buy? Enter product number: ");

    foreach ($products as $key => $product) {
        if ($selectedProduct === $key) {
            $amount = (int) readline("Enter how many you want to purchase (Available: {$product->quantity} {$product->name}(s)! ");
            if ($amount < 1 || $amount > $product->quantity) {
                $msg = "Invalid amount!" . PHP_EOL;
            } elseif (($product->price * $amount) / 100 > $remainingBalance) {
                $msg = "You can't afford that!" . PHP_EOL;
            } else {
                $product->quantity -= $amount;
                $shoppingCart[$product->name] = $amount;
                $total += $product->price * $amount / 100;
                $msg = "{$amount} {$product->name}(s) added to you cart!" . PHP_EOL;
                $remainingBalance = $customer->balance / 100 - $total;
            }
            break;
        } else {
            $msg = "Invalid input" . PHP_EOL;
        }
    }

    echo $msg . PHP_EOL;
    echo "BALANCE: {$remainingBalance}" . PHP_EOL;
    echo "Current sum: {$total}$" . PHP_EOL;

    $buyMore = readline("Do you want to buy more (yes/no)? ");
    if ($buyMore !== "yes") {
        echo "You paid {$total} for your cart. Your remaining balance is {$remainingBalance}$" . PHP_EOL;
        exit;
    }
}
