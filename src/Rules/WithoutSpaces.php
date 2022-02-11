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
        $this->errorMessage = $errorMessage;
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
        return preg_match('/^\S*$/u', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->errorMessage ? $this->errorMessage : trans('advancedValidation::validation.without_spaces');
    }
}
