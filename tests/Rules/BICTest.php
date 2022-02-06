<?php

namespace Arifszn\AdvancedValidation\Tests\Rules;

use Arifszn\AdvancedValidation\Rules\BIC;
use Arifszn\AdvancedValidation\Tests\TestCase;

class BICTest extends TestCase
{
    /**
     * @dataProvider provider
     */
    public function testValidation($result, $value)
    {
        $this->assertEquals($result, (new BIC())->passes('foo', $value));
    }

    public function provider()
    {
        return [
            [true, 'SBICKEN1345'],
            [true, 'SBICKEN1'],
            [true, 'SBICKENY'],
            [true, 'SBICKEN1YYP'],
            [false, 'SBIC23NXXX'],
            [false, 'S23CKENXXXX'],
            [false, 'SBICKENXX'],
            [false, 'SBICKENXX9'],
            [false, 'SBICKEN13458'],
            [false, 'SBICKEN'],
            [false, 'SBICKXX'],
        ];
    }
}
