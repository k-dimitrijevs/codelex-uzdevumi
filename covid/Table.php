<?php declare(strict_types=1);

require_once "ConsoleTable.php";

class Table
{
    private array $data = [];
    private ConsoleTable $table;

    public function __construct()
    {
        if(($open = fopen("covid_19_valstu_saslimstibas_raditaji.csv", "r")) !== false)
        {
            while (($data = fgetcsv($open, 1000, ";")) !== false)
            {
                $this->data[] = $data;
            }
            fclose($open);
        }
    }

    public function getData(array $dataEntries = []): array
    {
        foreach ($this->data as $entry) {
            $dataEntries[] = $entry;
        }
        return $dataEntries;
    }

    public function getHeader(): array
    {
        return array_shift($this->data);
    }

    public function displayData(ConsoleTable $table)
    {
        $covidEntries = [];

        $headers = $this->getHeader();

        foreach ($headers as $header)
        {
            $table->addHeader(mb_strimwidth($header, 0, 10));
        }

        foreach ($this->getData($covidEntries) as $column)
        {
            $table->addRow();
            foreach ($column as $item) {
                $table->addColumn(mb_strimwidth($item, 0, 10));
            }
        }
        $table->display();
    }
}