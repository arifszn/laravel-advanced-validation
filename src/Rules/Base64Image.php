<?php

namespace Arifszn\AdvancedValidation\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\File;

/**
 * The field under validation must be Base64 encoded image.
 *
 * @package Arifszn\AdvancedValidation\Rules
 */
class Base64Image implements Rule
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
        $this->message = $message ? $message : trans('advancedValidation::validation.base64_image');
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
        try {
            if (strpos($value, ';base64') !== false) {
                [, $value] = explode(';', $value);
                [, $value] = explode(',', $value);
            }

            $tempFile = tempnam(sys_get_temp_dir(), 'temp');
            file_put_contents($tempFile, base64_decode($value));

            $validation = Validator::make(
                ['file' => new File($tempFile)],
                ['file' => 'image'],
            );

            return !$validation->fails();
        } catch (\Throwable $th) {
            return false;
        }
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
