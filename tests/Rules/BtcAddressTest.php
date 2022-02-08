<?php

namespace Arifszn\AdvancedValidation\Tests\Rules;

use Arifszn\AdvancedValidation\Rules\BtcAddress;
use Arifszn\AdvancedValidation\Tests\TestCase;

class BtcAddressTest extends TestCase
{
    /**
     * @dataProvider provider
     */
    public function testValidation($result, $value)
    {
        $this->assertEquals($result, (new BtcAddress())->passes('foo', $value));
    }

    public function provider()
    {
        return [
            [true, '1MUz4VMYui5qY1mxUiG8BQ1Luv6tqkvaiL'],
            [true, '3J98t1WpEZ73CNmQviecrnyiWrnqRhWNLy'],
            [true, 'bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdq'],
            [true, '14qViLJfdGaP4EeHnDyJbEGQysnCpwk3gd'],
            [true, '35bSzXvRKLpHsHMrzb82f617cV4Srnt7hS'],
            [true, '17VZNX1SN5NtKa8UQFxwQbFeFc3iqRYhemt'],
            [true, 'bc1qw508d6qejxtdg4y5r3zarvary0c5xw7kv8f3t4'],
            [false, '4J98t1WpEZ73CNmQviecrnyiWrnqRhWNLy'],
            [false, '0x56F0B8A998425c53c75C4A303D4eF987533c5597'],
            [false, 'pp8skudq3x5hzw8ew7vzsw8tn4k8wxsqsv0lt0mf3g'],
            [false, '17VZNX1SN5NlKa8UQFxwQbFeFc3iqRYhem'],
            [false, 'BC1QW5f08D6QEJXTDG4Y5R3ZARVAYR0C5XW7KV8F3T4'],
        ];
    }
}
