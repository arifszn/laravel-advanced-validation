<?php

namespace Arifszn\AdvancedValidation\Tests\Rules;

use Arifszn\AdvancedValidation\Rules\Ascii;
use Arifszn\AdvancedValidation\Tests\TestCase;

class AsciiTest extends TestCase
{
    /**
     * @dataProvider provider
     */
    public function testValidation($result, $value)
    {
        $this->assertEquals($result, (new Ascii())->passes('foo', $value));
    }

    public function provider()
    {
        return [
            [true, 'foobar'],
            [true, '0987654321'],
            [true, 'test@example.com'],
            [true, '1234abcDEF'],
            [true, '1234 abc DEF'],
            [false, 'ｆｏｏbar'],
            [false, 'ｘｙｚ０９８'],
            [false, '１２３456'],
            [false, '消极的'],
        ];
    }
}
