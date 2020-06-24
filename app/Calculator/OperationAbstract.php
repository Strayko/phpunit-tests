<?php

namespace App\Calculator;

abstract class OperationAbstract
{
    /**
     * @var array
     */
    protected $operands = [];

    public function setOperands($operands)
    {
        $this->operands = $operands;
    }
}