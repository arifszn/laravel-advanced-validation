<?php

namespace Arifszn\AdvancedValidation\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * The field under validation must be a valid name.
 *
 *  - no emoji
 *  - no number (if $allowNumber flag is false)
 *  - special characters are allowed
 *
 * @package Arifszn\AdvancedValidation\Rules
 */
class Name implements Rule
{
    /**
     * @var bool
     */
    private $allowNumber;

    /**
     * @var string
     */
    private $errorMessage;

    /**
     * Create a new rule instance.
     *
     * @param bool $allowNumber   Allow number.
     * @param string|null $errorMessage   Custom error message.
     * @return void
     */
    public function __construct(bool $allowNumber = false, string $errorMessage = null)
    {
        $this->allowNumber = $allowNumber;
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
        // check no emoji
        if (preg_match('/\p{S}/u', $value)) {
            return false;
        }

        if (!$this->allowNumber && !preg_match('/^([^0-9]*)$/', $value)) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->errorMessage ? $this->errorMessage : trans('advancedValidation::validation.name');
    }
}
