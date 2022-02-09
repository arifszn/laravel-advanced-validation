<?php

namespace Arifszn\AdvancedValidation\Tests\Rules;

use Arifszn\AdvancedValidation\Rules\DataURI;
use Arifszn\AdvancedValidation\Tests\TestCase;

class DataURITest extends TestCase
{
    /**
     * @dataProvider provider
     */
    public function testValidation($result, $value)
    {
        $this->assertEquals($result, (new DataURI())->passes('foo', $value));
    }

    public function provider()
    {
        return [
            [true, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQAQMAAAAlPW0iAAAABlBMVEUAAAD///+l2Z/dAAAAM0lEQVR4nGP4/5/h/1+G/58ZDrAz3D/McH8yw83NDDeNGe4Ug9C9zwz3gVLMDA/A6P9/AFGGFyjOXZtQAAAAAElFTkSuQmCC'],
            [true, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAIBAMAAAA2IaO4AAAAFVBMVEXk5OTn5+ft7e319fX29vb5+fn///++GUmVAAAALUlEQVQIHWNICnYLZnALTgpmMGYIFWYIZTA2ZFAzTTFlSDFVMwVyQhmAwsYMAKDaBy0axX/iAAAAAElFTkSuQmCC'],
            [true, '   data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAIBAMAAAA2IaO4AAAAFVBMVEXk5OTn5+ft7e319fX29vb5+fn///++GUmVAAAALUlEQVQIHWNICnYLZnALTgpmMGYIFWYIZTA2ZFAzTTFlSDFVMwVyQhmAwsYMAKDaBy0axX/iAAAAAElFTkSuQmCC   '],
            [true, 'data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%22%20height%3D%22100%22%3E%3Crect%20fill%3D%22%2300B1FF%22%20width%3D%22100%22%20height%3D%22100%22%2F%3E%3C%2Fsvg%3E'],
            [true, 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAiIGhlaWdodD0iMTAwIj48cmVjdCBmaWxsPSIjMDBCMUZGIiB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIvPjwvc3ZnPg=='],
            [true, ' data:,Hello%2C%20World!'],
            [true, ' data:,Hello World!'],
            [true, ' data:text/plain;base64,SGVsbG8sIFdvcmxkIQ%3D%3D'],
            [true, ' data:text/html,%3Ch1%3EHello%2C%20World!%3C%2Fh1%3E'],
            [true, 'data:,A%20brief%20note'],
            [true, 'data:text/html;charset=US-ASCII,%3Ch1%3EHello!%3C%2Fh1%3E'],

            [false, 'dataxbase64'],
            [false, 'data:HelloWorld'],
            [false, 'data:,A%20brief%20invalid%20[note'],
            [false, 'file:text/plain;base64,SGVsbG8sIFdvcmxkIQ%3D%3D'],
            [false, 'data:text/html;charset=,%3Ch1%3EHello!%3C%2Fh1%3E'],
            [false, 'data:text/html;charset,%3Ch1%3EHello!%3C%2Fh1%3E'],
            [false, 'data:base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQAQMAAAAlPW0iAAAABlBMVEUAAAD///+l2Z/dAAAAM0lEQVR4nGP4/5/h/1+G/58ZDrAz3D/McH8yw83NDDeNGe4Ug9C9zwz3gVLMDA/A6P9/AFGGFyjOXZtQAAAAAElFTkSuQmCC'],
            [false, ''],
            [false, 'http://wikipedia.org'],
            [false, 'base64'],
            [false, 'iVBORw0KGgoAAAANSUhEUgAAABAAAAAQAQMAAAAlPW0iAAAABlBMVEUAAAD///+l2Z/dAAAAM0lEQVR4nGP4/5/h/1+G/58ZDrAz3D/McH8yw83NDDeNGe4Ug9C9zwz3gVLMDA/A6P9/AFGGFyjOXZtQAAAAAElFTkSuQmCC'],
        ];
    }
}
