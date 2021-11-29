<?php

namespace Arifszn\AdvancedValidation\Tests\Rules;

use Arifszn\AdvancedValidation\Rules\Base64String;
use Arifszn\AdvancedValidation\Tests\TestCase;

class Base64StringTest extends TestCase
{
    /**
     * @dataProvider provider
     */
    public function testValidation($result, $value)
    {
        $this->assertEquals($result, (new Base64String())->passes('foo', $value));
    }

    public function provider()
    {
        return [
            [true, 'YWJj'],
            [true, 'YWJjIDEyMw=='],
            [true, 'TGFyYXZlbCBBZHZhbmNlIFZhbGlkYXRpb24='],
            [true, 'q40Zkt7bp7ywfjet9HQIIZ57Jo7whaQn9G/Lth3Uduo='],
            [false, 'abc'],
            [false, '123'],
            [false, 'T2GFyYXZlbCBBZHZhbmNlIFZhbGlkYXRpb24='],
            [false, 'q40Zkt7bp7ywfjet9HQIIZ57Jo7whaQn9G/Lth32Uduo='],
        ];
    }
}
