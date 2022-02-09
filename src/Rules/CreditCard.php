<?php

namespace Arifszn\AdvancedValidation\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * The field under validation must be a valid credit card number.
 *
 * @package Arifszn\AdvancedValidation\Rules
 */
class CreditCard implements Rule
{
    /**
     * @var string
     */
    private $errorMessage;

    /**
     * Create a new rule instance.
     *
     * @param string $errorMessage   Custom error message.
     * @return void
     */
    public function __construct(string $errorMessage = null)
    {
        $this->errorMessage = $errorMessage ? $errorMessage : trans('advancedValidation::validation.credit_card');
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $value = str_replace(' ', '', str_replace('-', '', $value));

        if (!(preg_match('/^(?:4[0-9]{12}(?:[0-9]{3,6})?|5[1-5][0-9]{14}|(222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12}|6(?:011|5[0-9][0-9])[0-9]{12,15}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11}|6[27][0-9]{14}|^(81[0-9]{14,17}))$/', $value))) {
            return false;
        }

        $sum = 0;
        $digit = 0;
        $tmpNum = 0;
        $shouldDouble = false;

        for ($i = (strlen($value) - 1); $i >= 0; $i--) {
            $digit = substr($value, $i, 1);
            $tmpNum = intval($digit, 10);

            if ($shouldDouble) {
                $tmpNum *= 2;
                
                if ($tmpNum >= 10) {
                    $sum += (($tmpNum % 10) + 1);
                } else {
                    $sum += $tmpNum;
                }
            } else {
                $sum += $tmpNum;
            }

            $shouldDouble = !$shouldDouble;
        }

        return !!(($sum % 10) === 0 ? true : false);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->errorMessage;
    }
}
