<?php

namespace Alcohol\Tests;

use Alcohol\ISO3166;

class ISO3166Test extends \PHPUnit_Framework_TestCase
{
    public $data = array(
        'alpha2' => 'AX',
        'alpha3' => 'ALA',
        'numeric' => '248',
        'name' => 'Åland Islands',
        'currency' => 'EUR'
    );

    public function testGetByAlpha2ReturnsCorrectData()
    {
        $this->assertEquals(
            $this->data,
            ISO3166::getByAlpha2($this->data['alpha2'])
        );
    }

    /**
     * @dataProvider invalidAlpha2
     * @expectedException \InvalidArgumentException
     */
    public function testGetByInvalidAlpha2ThrowsInvalidArgumentException($alpha2)
    {
        ISO3166::getByAlpha2($alpha2);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testGetByUnknownAlpha2ThrowsRuntimeException()
    {
        ISO3166::getByAlpha2('ZZ');
    }

    public function testGetByAlpha3ReturnsCorrectData()
    {
        $this->assertEquals(
            $this->data,
            ISO3166::getByAlpha3($this->data['alpha3'])
        );
    }

    /**
     * @dataProvider invalidAlpha3
     * @expectedException \InvalidArgumentException
     */
    public function testGetByInvalidAlpha3ThrowsInvalidArgumentException($alpha3)
    {
        ISO3166::getByAlpha3($alpha3);
    }

    /**
     *
     * @expectedException \RuntimeException
     */
    public function testGetByUnknownAlpha3ThrowsRuntimeException()
    {
        ISO3166::getByAlpha3('ZZZ');
    }

    public function testGetByNumericReturnsCorrectData()
    {
        $this->assertEquals(
            $this->data,
            ISO3166::getByNumeric($this->data['numeric'])
        );
    }

    /**
     * @dataProvider invalidNumeric
     * @expectedException \InvalidArgumentException
     */
    public function testGetByInvalidNumericThrowsInvalidArgumentException($numeric)
    {
        ISO3166::getByNumeric($numeric);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testGetByUnknownNumericThrowsRuntimeException()
    {
        ISO3166::getByNumeric('000');
    }

    public function invalidAlpha2()
    {
        return array(array('Z'), array('ZZZ'));
    }

    public function invalidAlpha3()
    {
        return array(array('ZZ'), array('ZZZZ'));
    }

    public function invalidNumeric()
    {
        return array(array('00'), array('0000'));
    }
}
