<?php

namespace Arifszn\AdvancedValidation\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * The field under validation must be a hash of type algorithm. Algorithm is one of 
 * ['md4', 'md5', 'sha1', 'sha256', 'sha384', 'sha512', 'ripemd128', 'ripemd160', 
 * 'tiger128', 'tiger160', 'tiger192', 'crc32', 'crc32b']
 *
 * @package Arifszn\AdvancedValidation\Rules
 */
class Hash implements Rule
{
    /**
     * @var string
     */
    private $algorithm;

    /**
     * @var string
     */
    private $errorMessage;

    /**
     * @var string
     */
    private $attribute;

    /**
     * Create a new rule instance.
     *
     * @param string $algorithm   'md4' | 'md5' | 'sha1' | 'sha256' | 'sha384' | 'sha512' | 'ripemd128' | 'ripemd160' | 'tiger128' | 'tiger160' | 'tiger192' | 'crc32' | 'crc32b'
     * @param string|null $errorMessage   Custom error message.
     * @return void
     */
    public function __construct(string $algorithm, string $errorMessage = null)
    {
        $this->algorithm = $algorithm;
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

        try {
            $hash = '/^[a-fA-F0-9]{' . $this->getLength($this->algorithm) . '}$/';

            return preg_match($hash, $value);
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
        return $this->errorMessage ? $this->errorMessage : trans('advancedValidation::validation.hash', [
            'attribute' => $this->attribute,
            'algorithm' => $this->algorithm
        ]);
    }

    /**
     * Get length.
     *
     * @param string $algorithm
     * @return int
     */
    private function getLength(string $algorithm)
    {
        $lengths = [
            'md5' => 32,
            'md4' => 32,
            'sha1' => 40,
            'sha256' => 64,
            'sha384' => 96,
            'sha512' => 128,
            'ripemd128' => 32,
            'ripemd160' => 40,
            'tiger128' => 32,
            'tiger160' => 40,
            'tiger192' => 48,
            'crc32' => 8,
            'crc32b' => 8,
        ];

        return $lengths[$algorithm];
    }
}
