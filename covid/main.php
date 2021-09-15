<?php declare(strict_types=1);

require_once "Table.php";
require_once 'ConsoleTable.php';

$covid = new Table();
$table = new ConsoleTable();

$covid->displayData($table);




