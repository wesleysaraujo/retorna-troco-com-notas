<?php

namespace Tests\Pdv;

require_once __DIR__ . '/../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use App\Pdv\Calculator;

class CalculatorTest extends TestCase
{
    const VALUE = 37;
    
    const PAYMENT_VALUE = 100;

    public $calculator;

    public $changeOfMoney;

    public $changeOfMoneyNotes;
    
    public function setUp()
    {
        $this->calculator = new Calculator(self::VALUE, self::PAYMENT_VALUE);
        $this->changeOfMoney = $this->calculator->changeOfMoney();
        $this->changeOfMoneyNotes = $this->calculator->getChangeOfMoneyNotes();
    }

    public function testHasChangeOfMoney()
    {
        
    }
}

