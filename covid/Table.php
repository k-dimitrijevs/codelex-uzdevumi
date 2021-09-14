<?php declare(strict_types=1);

require_once "ConsoleTable.php";

class Table
{
    private array $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getData(array $dataEntries = []): array
    {
        foreach ($this->data as $entry) {
            $dataEntries[] = explode(";", $entry);
        }
        return $dataEntries;
    }

    public function getHeader(): array
    {
        return explode(";", array_shift($this->data),);
    }
}