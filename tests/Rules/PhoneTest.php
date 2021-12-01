<?php

namespace Arifszn\AdvancedValidation\Tests\Rules;

use Arifszn\AdvancedValidation\Rules\Phone;
use Arifszn\AdvancedValidation\Tests\TestCase;

class PhoneTest extends TestCase
{
    /**
     * @dataProvider provider
     */
    public function testValidation($result, $value)
    {
        $this->assertEquals($result, (new Phone())->passes('phone', $value));
    }

    public function provider()
    {
        return [
            [true, '+1-202-555-0125'],
            [true, '+12025550125'],
            [true, '2025550125'],
            [false, '2025@550125'],
            [true, '9878775858'],
            [false, '898585858'],
            [true, '58585858585'],
            [false, '0000000000'],
            [false, '          '],
            [false, 'abc'],
        ];
    }
}
