<?php

namespace Arifszn\AdvancedValidation\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * The field under validation must be Base64 encoded string.
 *
 * @package Arifszn\AdvancedValidation\Rules
 */
class Base64String implements Rule
{
    
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return base64_encode(base64_decode($value, true)) === $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('advancedValidation::validation.base64_string');
    }
}
