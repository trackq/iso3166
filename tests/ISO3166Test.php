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
     * @expectedException \InvalidArgumentException
     */
    public function testGetByInvalidAlpha2ThrowsInvalidArgumentException()
    {
        ISO3166::getByAlpha2('ZZZ');
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
     * @expectedException \InvalidArgumentException
     */
    public function testGetByInvalidAlpha3ThrowsInvalidArgumentException()
    {
        ISO3166::getByAlpha3('ZZ');
    }

    /**
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
     * @expectedException \InvalidArgumentException
     */
    public function testGetByInvalidNumericThrowsInvalidArgumentException()
    {
        ISO3166::getByNumeric('00');
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testGetByUnknownNumericThrowsRuntimeException()
    {
        ISO3166::getByNumeric('000');
    }
}
