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
            [true, 'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png'],
            [false, 'https://www.google.com/images/branding/googlelogo'],
            [false, '123'],
            [false, 'abc'],
            [false, ''],
        ];
    }
}
