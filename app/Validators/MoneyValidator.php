<?php

namespace App\Validators;

use Illuminate\Validation\Validator;

class MoneyValidator extends Validator
{

    public function validateMoney($attribute, $value)
    {
        preg_match('/^\d+\.\d\d$/', formatMoney($value), $output);
        return formatMoney($value) == $output[0];
    }
}