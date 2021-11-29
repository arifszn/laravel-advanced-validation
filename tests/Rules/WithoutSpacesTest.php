<?php

namespace Arifszn\AdvancedValidation\Tests\Rules;

use Arifszn\AdvancedValidation\Rules\WithoutSpaces;
use Arifszn\AdvancedValidation\Tests\TestCase;

class WithoutSpacesTest extends TestCase
{
    /**
     * @dataProvider provider
     */
    public function testValidation($result, $value)
    {
        $this->assertEquals($result, (new WithoutSpaces())->passes('foo', $value));
    }

    public function provider()
    {
        return [
            [true, 'abc'],
            [true, '123'],
            [false, 'abc 123'],
            [false, 'abc abc abc'],
        ];
    }
}
