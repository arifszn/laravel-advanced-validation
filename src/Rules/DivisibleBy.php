<?php

namespace Arifszn\AdvancedValidation\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;

/**
 * The field under validation must be divisible by another.
 *
 * @package Arifszn\AdvancedValidation\Rules
 */
class DivisibleBy implements Rule
{
    /**
     * @var string
     */
    private $errorMessage;

    /**
     * @var int
     */
    private $number;

    /**
     * @var string
     */
    private $attribute;

    /**
     * Create a new rule instance.
     *
     * @param int $number   Divisible by number.
     * @param string|null $errorMessage   Custom error message.
     * @return void
     */
    public function __construct(int $number, string $errorMessage = null)
    {
        $this->number = $number;
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
        $this->attribute = $attribute;

        $floatValidation = Validator::make(
            ['float' => $value],
            ['float' => ['required', new FloatNumber()]],
        );

        return !$floatValidation->fails() && (fmod(floatval($value), intval($this->number, 10)) === 0.0);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->errorMessage ? $this->errorMessage : trans('advancedValidation::validation.divisible_by', [
            'attribute' => $this->attribute,
            'number' => $this->number
        ]);
    }
}
