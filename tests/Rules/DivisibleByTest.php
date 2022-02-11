<?php

namespace Arifszn\AdvancedValidation\Tests\Rules;

use Arifszn\AdvancedValidation\Rules\DivisibleBy;
use Arifszn\AdvancedValidation\Tests\TestCase;

class DivisibleByTest extends TestCase
{
    /**
     * @dataProvider provider
     */
    public function testValidation($result, $value)
    {
        $this->assertEquals($result, (new DivisibleBy(2))->passes('foo', $value));
    }

    public function provider()
    {
        return [
            [true, '2'],
            [true, '4'],
            [true, '100'],
            [true, '1000'],

            [false, '1'],
            [false, '2.5'],
            [false, '101'],
            [false, 'foo'],
            [false, ''],
            [false, '2020-01-06T14:31:00.135Z'],
        ];
    }
}
