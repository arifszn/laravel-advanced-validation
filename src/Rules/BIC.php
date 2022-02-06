<?php

namespace Arifszn\AdvancedValidation\Rules;

use Illuminate\Contracts\Validation\Rule;
use Arifszn\AdvancedValidation\Lib\ValidISO31661Alpha2CountriesCodes;

/**
 * The field under validation must be a BIC(Business Identifier Code) or SWIFT code.
 *
 * @package Arifszn\AdvancedValidation\Rules
 */
class BIC implements Rule
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
        $this->message = $message ? $message : trans('advancedValidation::validation.bic');
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
        return in_array(substr($value, 4, 2), ValidISO31661Alpha2CountriesCodes::COUNTRY_CODES) &&
            preg_match('/^[A-Za-z]{6}[A-Za-z0-9]{2}([A-Za-z0-9]{3})?$/', $value);
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
