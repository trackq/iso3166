<?php

/**
 * (c) Rob Bast <rob.bast@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Alcohol\Tests;

use Alcohol\ISO3166;

class ISO3166Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider invalidAlpha2Provider
     * @param string $alpha2
     * @expectedException \InvalidArgumentException
     */
    public function getByAlpha2_throws_InvalidArgumentException_for_invalid_alpha2($alpha2)
    {
        ISO3166::getByAlpha2($alpha2);
    }

    /**
     * @test
     * @expectedException \RuntimeException
     */
    public function getByAlpha2_throws_RuntimeException_for_unknown_alpha2()
    {
        ISO3166::getByAlpha2('ZZ');
    }

    /**
     * @test
     * @dataProvider alpha2Provider
     * @param string $alpha2
     * @param array $expected
     */
    public function getByAlpha2_returns_expected_data($alpha2, array $expected)
    {
        $this->assertEquals(
            $expected,
            ISO3166::getByAlpha2($alpha2)
        );
    }

    /**
     * @test
     * @param string $alpha3
     * @dataProvider invalidAlpha3Provider
     * @expectedException \InvalidArgumentException
     */
    public function getByAlpha3_throws_InvalidArgumentException_for_invalid_alpha3($alpha3)
    {
        ISO3166::getByAlpha3($alpha3);
    }

    /**
     * @test
     * @expectedException \RuntimeException
     */
    public function getByAlpha3_throws_RuntimeException_for_unknown_alpha3()
    {
        ISO3166::getByAlpha3('ZZZ');
    }

    /**
     * @test
     * @dataProvider alpha3Provider
     * @param string $alpha3
     * @param array $expected
     */
    public function getByAlpha3_returns_expected_data($alpha3, array $expected)
    {
        $this->assertEquals(
            $expected,
            ISO3166::getByAlpha3($alpha3)
        );
    }

    /**
     * @test
     * @param string $numeric
     * @dataProvider invalidNumericProvider
     * @expectedException \InvalidArgumentException
     */
    public function getByNumeric_throws_InvalidArgumentException_for_invalid_numeric($numeric)
    {
        ISO3166::getByNumeric($numeric);
    }

    /**
     * @test
     * @expectedException \RuntimeException
     */
    public function getByNumeric_throws_RuntimeException_for_unknown_numeric()
    {
        ISO3166::getByNumeric('000');
    }

    /**
     * @test
     * @dataProvider numericProvider
     * @param string $numeric
     * @param array $expected
     */
    public function getByNumeric_returns_expected_data($numeric, $expected)
    {
        $this->assertEquals(
            $expected,
            ISO3166::getByNumeric($numeric)
        );
    }

    /**
     * @return array
     */
    public function invalidAlpha2Provider()
    {
        return array(array('Z'), array('ZZZ'), array(1), array(123));
    }

    /**
     * @return array
     */
    public function alpha2Provider()
    {
        $countries = $this->getCountries();

        return array_reduce(
            $countries,
            function (array $carry, array $country) {
                $carry[] = array($country['alpha2'], $country);
                return $carry;
            },
            array()
        );
    }

    /**
     * @return array
     */
    public function invalidAlpha3Provider()
    {
        return array(array('ZZ'), array('ZZZZ'), array(12), array(1234));
    }

    /**
     * @return array
     */
    public function alpha3Provider()
    {
        $countries = $this->getCountries();

        return array_reduce(
            $countries,
            function (array $carry, array $country) {
                $carry[] = array($country['alpha3'], $country);
                return $carry;
            },
            array()
        );
    }

    /**
     * @return array
     */
    public function invalidNumericProvider()
    {
        return array(array('00'), array('0000'), array('ZZ'), array('ZZZZ'));
    }

    /**
     * @return array
     */
    public function numericProvider()
    {
        $countries = $this->getCountries();

        return array_reduce(
            $countries,
            function (array $carry, array $country) {
                $carry[] = array($country['numeric'], $country);
                return $carry;
            },
            array()
        );
    }

    /**
     * @return array
     */
    private function getCountries()
    {
        $reflected = new \ReflectionClass('Alcohol\ISO3166');
        $countries = $reflected->getProperty('countries');
        $countries->setAccessible(true);

        return $countries->getValue(new ISO3166);
    }
}
