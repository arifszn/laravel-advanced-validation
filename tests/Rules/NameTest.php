<?php

namespace Arifszn\AdvancedValidation\Tests\Rules;

use Arifszn\AdvancedValidation\Rules\Name;
use Arifszn\AdvancedValidation\Tests\TestCase;

class NameTest extends TestCase
{
    /**
     * @dataProvider providerWithoutAllowNumber
     */
    public function testValidationWithoutAllowNumber($result, $value)
    {
        $this->assertEquals($result, (new Name(false))->passes('foo', $value));
    }

    /**
     * @dataProvider providerWithAllowNumber
     */
    public function testValidationWithAllowNumber($result, $value)
    {
        $this->assertEquals($result, (new Name(true))->passes('foo', $value));
    }

    public function providerWithoutAllowNumber()
    {
        return array_merge($this->shared(), [
            [false, '1234 abc DEF'],
            [false, '1234abcDEF'],
            [false, '消极的123'],
        ]);
    }

    public function providerWithAllowNumber()
    {
        return array_merge($this->shared(), [
            [true, '1234 abc DEF'],
            [true, '1234abcDEF'],
            [true, '消极的123'],
        ]);
    }

    private function shared()
    {
        return [
            [true, 'foobar'],
            [true, 'ｆｏｏbar'],
            [true, 'a'],
            [true, '消极的'],
            [true, '###'],
            [true, '**'],
            [false, '😀'],
            [false, 'john 😀'],
            [false, ''],
            [false, '  '],
        ];
    }
}
