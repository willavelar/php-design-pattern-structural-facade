<?php

namespace DesignPattern\Wrong;

class DiscountCalculator
{
    public function calc(Budget $budget, Log $log) : float
    {
        $discountCalc = $budget->value *  0.1;
        
        $log->save($discountCalc);

        return $discountCalc;
    }
}