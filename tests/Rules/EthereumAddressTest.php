<?php

namespace Arifszn\AdvancedValidation\Tests\Rules;

use Arifszn\AdvancedValidation\Rules\EthereumAddress;
use Arifszn\AdvancedValidation\Tests\TestCase;

class EthereumAddressTest extends TestCase
{
    /**
     * @dataProvider provider
     */
    public function testValidation($result, $value)
    {
        $this->assertEquals($result, (new EthereumAddress())->passes('foo', $value));
    }

    public function provider()
    {
        return [
            [true, '0x0000000000000000000000000000000000000001'],
            [true, '0x683E07492fBDfDA84457C16546ac3f433BFaa128'],
            [true, '0x88dA6B6a8D3590e88E0FcadD5CEC56A7C9478319'],
            [true, '0x8a718a84ee7B1621E63E680371e0C03C417cCaF6'],
            [true, '0xFCb5AFB808b5679b4911230Aa41FfCD0cd335b42'],

            [false, '0xGHIJK05pwm37asdf5555QWERZCXV2345AoEuIdHt'],
            [false, '0xFCb5AFB808b5679b4911230Aa41FfCD0cd335b422222'],
            [false, '0xFCb5AFB808b5679b4911230Aa41FfCD0cd33'],
            [false, '0b0110100001100101011011000110110001101111'],
            [false, '683E07492fBDfDA84457C16546ac3f433BFaa128'],
            [false, '1C6o5CDkLxjsVpnLSuqRs1UBFozXLEwYvU'],
        ];
    }
}
