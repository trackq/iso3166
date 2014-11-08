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
     * @expectedExceptionMessageRegExp /^Not a valid alpha2: .*$/
     */
    public function getByAlpha2_throws_InvalidArgumentException_for_invalid_alpha2($alpha2)
    {
        $iso3166 = new ISO3166;
        $iso3166->getByAlpha2($alpha2);
    }

    /**
     * @test
     * @expectedException \RuntimeException
     * @expectedExceptionMessage ISO3166-1 does not contain: ZZ
     */
    public function getByAlpha2_throws_RuntimeException_for_unknown_alpha2()
    {
        $iso3166 = new ISO3166;
        $iso3166->getByAlpha2('ZZ');
    }

    /**
     * @test
     * @dataProvider alpha2Provider
     * @param string $alpha2
     * @param array $expected
     */
    public function getByAlpha2_returns_expected_data($alpha2, array $expected)
    {
        $iso3166 = new ISO3166;
        $this->assertEquals($expected, $iso3166->getByAlpha2($alpha2));
    }

    /**
     * @test
     * @param string $alpha3
     * @dataProvider invalidAlpha3Provider
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessageRegExp /^Not a valid alpha3: .*$/
     */
    public function getByAlpha3_throws_InvalidArgumentException_for_invalid_alpha3($alpha3)
    {
        $iso3166 = new ISO3166;
        $iso3166->getByAlpha3($alpha3);
    }

    /**
     * @test
     * @expectedException \RuntimeException
     * @expectedExceptionMessage ISO3166-1 does not contain: ZZZ
     */
    public function getByAlpha3_throws_RuntimeException_for_unknown_alpha3()
    {
        $iso3166 = new ISO3166;
        $iso3166->getByAlpha3('ZZZ');
    }

    /**
     * @test
     * @dataProvider alpha3Provider
     * @param string $alpha3
     * @param array $expected
     */
    public function getByAlpha3_returns_expected_data($alpha3, array $expected)
    {
        $iso3166 = new ISO3166;
        $this->assertEquals($expected, $iso3166->getByAlpha3($alpha3));
    }

    /**
     * @test
     * @param string $numeric
     * @dataProvider invalidNumericProvider
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessageRegExp /^Not a valid numeric: .*$/
     */
    public function getByNumeric_throws_InvalidArgumentException_for_invalid_numeric($numeric)
    {
        $iso3166 = new ISO3166;
        $iso3166->getByNumeric($numeric);
    }

    /**
     * @test
     * @expectedException \RuntimeException
     * @expectedExceptionMessage ISO3166-1 does not contain: 000
     */
    public function getByNumeric_throws_RuntimeException_for_unknown_numeric()
    {
        $iso3166 = new ISO3166;
        $iso3166->getByNumeric('000');
    }

    /**
     * @test
     * @dataProvider numericProvider
     * @param string $numeric
     * @param array $expected
     */
    public function getByNumeric_returns_expected_data($numeric, $expected)
    {
        $iso3166 = new ISO3166;
        $this->assertEquals($expected, $iso3166->getByNumeric($numeric));
    }

    /**
     * @test
     */
    public function getAll_returns_array_with_X_elements()
    {
        $iso3166 = new ISO3166;
        $this->assertInternalType('array', $iso3166->getAll());
        $this->assertCount(249, $iso3166->getAll());
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
