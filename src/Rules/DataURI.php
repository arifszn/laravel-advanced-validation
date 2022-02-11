<?php

namespace Arifszn\AdvancedValidation\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * The field under validation must have data uri format.
 *
 * @package Arifszn\AdvancedValidation\Rules
 */
class DataURI implements Rule
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
        $validMediaType = '/^[a-z]+\/[a-z0-9\-\+]+$/i';

        $validAttribute = '/^[a-z\-]+=[a-z0-9\-]+$/i';

        $validData = '/^[a-z0-9!\$&\'\(\)\*\+,;=\-\._~:@\/\?%\s]*$/i';

        $data = explode(",", $value);

        if (count($data) < 2) {
            return false;
        }

        $attributes = explode(";", trim(array_shift($data)));

        $schemeAndMediaType = array_shift($attributes);

        if (substr($schemeAndMediaType, 0, 5) !== 'data:') {
            return false;
        }

        $mediaType = substr($schemeAndMediaType, 5);

        if ($mediaType !== '' && !preg_match($validMediaType, $mediaType)) {
            return false;
        }

        for ($i = 0; $i < count($attributes); $i++) {
            if (
                !($i === count($attributes) - 1 && strtolower($attributes[$i]) === 'base64') &&
                !preg_match($validAttribute, $attributes[$i])
            ) {
                return false;
            }
        }

        for ($i = 0; $i < count($data); $i++) {
            if (!preg_match($validData, $data[$i])) {
                return false;
            }
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
        return $this->errorMessage ? $this->errorMessage : trans('advancedValidation::validation.data_uri');
    }
}
