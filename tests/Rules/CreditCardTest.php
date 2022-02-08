<?php

namespace Arifszn\AdvancedValidation\Tests\Rules;

use Arifszn\AdvancedValidation\Rules\CreditCard;
use Arifszn\AdvancedValidation\Tests\TestCase;

class CreditCardTest extends TestCase
{
    /**
     * @dataProvider provider
     */
    public function testValidation($result, $value)
    {
        $this->assertEquals($result, (new CreditCard())->passes('foo', $value));
    }

    public function provider()
    {
        return [
            [true, '375556917985515'],
            [true, '36050234196908'],
            [true, '4716461583322103'],
            [true, '4716-2210-5188-5662'],
            [true, '4929 7226 5379 7141'],
            [true, '5398228707871527'],
            [true, '6283875070985593'],
            [true, '6263892624162870'],
            [true, '6234917882863855'],
            [true, '6234698580215388'],
            [true, '6226050967750613'],
            [true, '6246281879460688'],
            [true, '2222155765072228'],
            [true, '2225855203075256'],
            [true, '2720428011723762'],
            [true, '2718760626256570'],
            [true, '6765780016990268'],
            [true, '4716989580001715211'],
            [true, '8171999927660000'],
            [true, '8171999900000000021'],

            [false, 'foo'],
            [false, '5398228707871528'],
            [false, '2718760626256571'],
            [false, '2721465526338453'],
            [false, '2220175103860763'],
            [false, '375556917985515999999993'],
            [false, '899999996234917882863855'],
            [false, 'prefix6234917882863855'],
            [false, '623491788middle2863855'],
            [false, '6234917882863855suffix'],
            [false, '4716989580001715213'],
        ];
    }
}
