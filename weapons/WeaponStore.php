<?php declare(strict_types=1);

class WeaponStore
{
    protected array $weaponList;

    public function __construct(array $weaponList)
    {
        foreach ($weaponList as $item)
        {
            $this->add($item);
        }
    }

    private function add(WepAndPrice $weapon): void
    {
        $this->weaponList[] = $weapon;
    }

    public function getWeaponList(): array
    {
        return $this->weaponList;
    }
}