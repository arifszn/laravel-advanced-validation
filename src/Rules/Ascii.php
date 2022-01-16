<?php

namespace Arifszn\AdvancedValidation\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * The field under validation must contain ASCII chars only.
 *
 * @package Arifszn\AdvancedValidation\Rules
 */
class Ascii implements Rule
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
        $this->message = $message ? $message : trans('advancedValidation::validation.ascii');
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
        return preg_match('/^[\x00-\x7F]+$/', $value);
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
