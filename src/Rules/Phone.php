<?php

namespace Arifszn\AdvancedValidation\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * The field under validation must be a valid phone number.
 *
 * @package Arifszn\AdvancedValidation\Rules
 */
class Phone implements Rule
{
    /**
     * @var string
     */
    private $message;

    /**
     * Create a new rule instance.
     *
     * @param string $message   Custom error message.
     * @return void
     */
    public function __construct(string $message = null)
    {
        $this->message = $message ? $message : trans('advancedValidation::validation.phone');
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
        return preg_match('/^(\+?\d{0,4})?\s?-?\s?(\(?\d{3}\)?)\s?-?\s?(\(?\d{3}\)?)\s?-?\s?(\(?\d{4}\)?)$/', $value) && !preg_match('/^\b(\d)\1{8,}\b$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
