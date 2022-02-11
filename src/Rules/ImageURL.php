<?php

namespace Arifszn\AdvancedValidation\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\File;

/**
 * The field under validation must be a valid image URL.
 *
 * @package Arifszn\AdvancedValidation\Rules
 */
class ImageURL implements Rule
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
        try {
            $tempFile = tempnam(sys_get_temp_dir(), 'temp');
            file_put_contents($tempFile, file_get_contents($value));

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
        return $this->errorMessage ? $this->errorMessage : trans('advancedValidation::validation.image_url');
    }
}
