<?php

namespace Arifszn\AdvancedValidation\Tests\Rules;

use Arifszn\AdvancedValidation\Rules\FloatNumber;
use Arifszn\AdvancedValidation\Tests\TestCase;

class FloatNumberTest extends TestCase
{
    /**
     * @dataProvider provider
     */
    public function testValidation($result, $value)
    {
        $this->assertEquals($result, (new FloatNumber())->passes('foo', $value));
    }

    public function provider()
    {
        return [
            [true, '123'],
            [true, '123.'],
            [true, '123.123'],
            [true, '-123.123'],
            [true, '-0.123'],
            [true, '+0.123'],
            [true, '0.123'],
            [true, '.0'],
            [true, '-.123'],
            [true, '+.123'],
            [true, '01.123'],
            [true, '-0.22250738585072011e-307'],

            [false, '+'],
            [false, '-'],
            [false, ' '],
            [false, ''],
            [false, '.'],
            [false, 'foo'],
            [false, '20.foo'],
            [false, '2020-01-06T14:31:00.135Z'],
        ];
    }
}
