<?php

namespace Arifszn\AdvancedValidation\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * The field under validation must not contain spaces.
 *
 * @package Arifszn\AdvancedValidation\Rules
 */
class WithoutSpaces implements Rule
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
        return preg_match('/^\S*$/u', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('advancedValidation::validation.without_spaces');
    }
}
