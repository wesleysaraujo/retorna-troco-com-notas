<?php

require_once __DIR__.'/vendor/autoload.php';

use App\Pdv\Calculator;

$calculator = new Calculator(28, 100);

$changeOfMoney = $calculator->changeOfMoney();
$changeOfMoneyNotes = $calculator->getChangeOfMoneyNotes();

echo "Troco: R$" . number_format($changeOfMoney, 2, ',', '.') . "\n";

foreach ($changeOfMoneyNotes as $key => $note) {
    $comma = $key > 0 ? ', ' : '';

    echo $comma . $note['quantity'] . ' nota de R$' . number_format($note['note'], 2, ',', '.');
}

echo ". \n";
