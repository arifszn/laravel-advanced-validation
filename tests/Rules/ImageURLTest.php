<?php

namespace Arifszn\AdvancedValidation\Tests\Rules;

use Arifszn\AdvancedValidation\Rules\ImageURL;
use Arifszn\AdvancedValidation\Tests\TestCase;

class ImageURLTest extends TestCase
{
    /**
     * @dataProvider provider
     */
    public function testValidation($result, $value)
    {
        $this->assertEquals($result, (new ImageURL())->passes('avatar', $value));
    }

    public function provider()
    {
        return [
            [true, 'https://www.php.net/images/logos/php-logo.png'],
            [false, 'https://imaginarysite123.com/invalid.png'],
            [false, '123'],
            [false, 'abc'],
            [false, ''],
        ];
    }
}
