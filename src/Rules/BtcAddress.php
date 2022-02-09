<?php

namespace Arifszn\AdvancedValidation\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * The field under validation must be a valid BTC address.
 *
 * @package Arifszn\AdvancedValidation\Rules
 */
class BtcAddress implements Rule
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
        $this->errorMessage = $errorMessage ? $errorMessage : trans('advancedValidation::validation.btc_address');
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
        $bech32 = '/^(bc1)[a-z0-9]{25,39}$/';
        $base58 = '/^(1|3)[A-HJ-NP-Za-km-z1-9]{25,39}$/';

        if (substr($value, 0, 3) === 'bc1') {
            return preg_match($bech32, $value);
        }
        
        return preg_match($base58, $value);
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
