<?php declare(strict_types=1);

require_once "Table.php";
require_once 'ConsoleTable.php';

$covid = new Table(file("covid_19_valstu_saslimstibas_raditaji.csv"));
$table = new ConsoleTable();

$covidEntries = [];

$headers = $covid->getHeader();

foreach ($headers as $header)
{
    $table->addHeader(mb_strimwidth($header, 0, 10));
}
//var_dump($covid->getData());die;
foreach ($covid->getData($covidEntries) as $column)
{
    $table->addRow();
    foreach ($column as $item) {
        $table->addColumn(mb_strimwidth($item, 0, 10));
    }
}
$table->display();




