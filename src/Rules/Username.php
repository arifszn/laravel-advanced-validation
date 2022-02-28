<?php

namespace Arifszn\AdvancedValidation\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * The field under validation must be a valid username.
 *
 *  - starts with a letter (alpha)
 *  - only alpha-numeric (a-z, A-Z, 0-9), underscore, minus and dot
 *  - multiple underscores, minus and are not allowed (-- or __ or ..)
 *  - underscores, minus and dot are not allowed at the beginning or end
 *
 * @package Arifszn\AdvancedValidation\Rules
 */
class Username implements Rule
{
    /**
     * @var string
     */
    private $errorMessage;

    /**
     * Create a new rule instance.
     *
     * @param string|null $errorMessage   Custom error message.
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
        return preg_match('/^[a-z][a-z0-9]*(?:[_\-\.][a-z0-9]+)*$/i', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->errorMessage ? $this->errorMessage : trans('advancedValidation::validation.username');
    }
}
