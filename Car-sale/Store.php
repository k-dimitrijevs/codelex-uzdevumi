<?php

class Store
{
    private array $items;

    public function __construct(array $items)
    {
        foreach ($items as $item) {
            $this->add($item);
        }
    }

    private function add(StoreItem $item): void
    {
        $this->items[] = $item;
    }
}