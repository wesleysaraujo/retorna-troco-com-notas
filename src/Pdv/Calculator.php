<?php

namespace App\Pdv;

class Calculator
{
    
    /**
     * Value of debit
     *
     * @var float $value
     */
    public $value;

    /**
     * Value of Payment
     *
     * @var float $paymentValue
     */
    public $paymentValue;

    public $changeOfMoney;
    
    /**
     * Change of money notes
     *
     * @var array $changeOfMoneyNotes
     */
    public $changeOfMoneyNotes;

    /**
     * Bancknotes;
     *
     * @var array $banckNotes
     */
    private static $banckNotes = [100, 50, 20, 10, 5, 2, 1];

    public function __construct($value = null, $paymentValue = null)
    {
        $this->value = $value;
        $this->paymentValue = $paymentValue;
        $this->changeOfMoney = $this->changeOfMoney();
        $this->changeOfMoneyNotes = [];
    }

    /**
     * Get value of value variable
     *
     * @return number
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set value of value attribute
     *
     * @param int $value
     * @return void
     */
    public function setValue(int ...$value)
    {
        $this->value = $value;
    }
 
    /**
     * Get payment value
     *
     * @return number
     */
    public function getPaymentValue()
    {
        return $this->paymentValue;
    }

    /**
     * Set value of payment
     *
     * @param int ...$paymentValue
     * @return void
     */
    public function setPaymentValue(int ...$paymentValue)
    {
        $this->paymentValue = $paymentValue;
    }
    
    public function changeOfMoney()
    {
        if ($this->paymentValue > $this->value) {
            return $this->paymentValue - $this->value;
        } else {
            return 'Você não possui troco';
        }
    }

    public function getChangeOfMoneyNotes()
    {
        if ($this->changeOfMoney > 0) {
            for ($i = 0; $i < count(self::$banckNotes); $i++) {
                $note = self::$banckNotes[$i];
                $calcNotes = $this->calcNotes();
                $missingChangeOfMoney = $this->changeOfMoney - $calcNotes;
                if ($this->changeOfMoney >= $note && $calcNotes < $this->changeOfMoney) {
                    $quantity = intval($missingChangeOfMoney / $note);
        
                    if ($quantity > 0) {
                        $this->addNoteOfChangeOfMoneyNotes($note, $quantity);
                    }
                }
            }

            return $this->changeOfMoneyNotes;
        }
    }

    private function addNoteOfChangeOfMoneyNotes($note, $quantity)
    {
        array_push(
            $this->changeOfMoneyNotes,
            [
                "note" => $note,
                "quantity" => $quantity,
            ]
        );
    }

    /**
    * Função que calcula o valor total levando em consideração as notas e suas quantidades
    *
    * @param  Array $notasTroco
    * @return number
    */
    private function calcNotes()
    {
        if (count($this->changeOfMoneyNotes) > 0) {
            $calc = 0;
            
            foreach ($this->changeOfMoneyNotes as $note) {
                $calc = $calc + ($note['note'] * $note['quantity']);
            }
    
            return $calc;
        } else {
            return 0;
        }
    }
}
