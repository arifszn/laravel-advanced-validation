<?php

namespace Arifszn\AdvancedValidation\Tests\Rules;

use Arifszn\AdvancedValidation\Rules\Hash;
use Arifszn\AdvancedValidation\Tests\TestCase;

class HashTest extends TestCase
{
    /**
     * @dataProvider provider
     */
    public function testValidation($result, $value)
    {
        $algorithms = ['md5', 'md4', 'ripemd128', 'tiger128'];

        foreach ($algorithms as $algorithm) {
            $this->assertEquals($result, (new Hash($algorithm))->passes('foo', $value));
        }
    }

    public function provider()
    {
        return [
            [true, 'd94f3f016ae679c3008de268209132f2'],
            [true, '751adbc511ccbe8edf23d486fa4581cd'],
            [true, '88dae00e614d8f24cfd5a8b3f8002e93'],
            [true, '0bf1c35032a71a14c2f719e5a14c1e96'],
            [true, 'd94f3F016Ae679C3008de268209132F2'],
            [true, '88DAE00e614d8f24cfd5a8b3f8002E93'],

            [false, 'q94375dj93458w34'],
            [false, '39485729348'],
            [false, '%&FHKJFvk'],
            [false, 'KYT0bf1c35032a71a14c2f719e5a1'],
        ];
    }
}
