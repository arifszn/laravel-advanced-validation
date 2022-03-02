<?php

namespace Arifszn\AdvancedValidation\Tests\Rules;

use Arifszn\AdvancedValidation\Rules\Username;
use Arifszn\AdvancedValidation\Tests\TestCase;

class UsernameTest extends TestCase
{
    /**
     * @dataProvider provider
     */
    public function testValidation($result, $value)
    {
        $this->assertEquals($result, (new Username())->passes('foo', $value));
    }

    public function provider()
    {
        return [
            [true, 'john'],
            [true, 'john.doe'],
            [true, 'john_doe'],
            [true, 'john-doe'],
            [true, 'john.doe.123'],
            [true, 'john123'],
            [true, 'john_123'],
            [true, 'john-123'],

            [false, '_john'],
            [false, '-john'],
            [false, '.john'],
            [false, 'john_'],
            [false, 'john-'],
            [false, 'john.'],
            [false, '_john_'],
            [false, 'john__doe'],
            [false, 'john--doe'],
            [false, 'john..doe'],
            [false, '123'],
            [false, '123.john'],
            [false, '&nbsp;'],
            [false, 'a b c'],
            [false, 'ｆｏｏbar'],
            [false, '😀'],
            [false, 'john😀'],
        ];
    }
}
