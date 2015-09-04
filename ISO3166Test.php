<?php

/*
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
     * @testdox Calling getByAlpha2 with an invalid alpha2 throws a DomainException.
     * @dataProvider invalidAlpha2Provider
     * @param string $alpha2
     * @expectedException \DomainException
     * @expectedExceptionMessageRegExp /^Not a valid alpha2: .*$/
     */
    public function testGetByAlpha2Invalid($alpha2)
    {
        $iso3166 = new ISO3166();
        $iso3166->getByAlpha2($alpha2);
    }

    /**
     * @testdox Calling getByAlpha2 with an unknown alpha2 throws a OutOfBoundsException.
     * @expectedException \OutOfBoundsException
     * @expectedExceptionMessage ISO 3166-1 does not contain: ZZ
     */
    public function testGetByAlpha2Unknown()
    {
        $iso3166 = new ISO3166();
        $iso3166->getByAlpha2('ZZ');
    }

    /**
     * @testdox Calling getByAlpha2 with a known alpha2 returns an associative array with the data.
     * @dataProvider alpha2Provider
     * @param string $alpha2
     * @param array $expected
     */
    public function testGetByAlpha2($alpha2, array $expected)
    {
        $iso3166 = new ISO3166();
        $this->assertEquals($expected, $iso3166->getByAlpha2($alpha2));
    }

    /**
     * @testdox Calling getByAlpha3 with an invalid alpha3 throws a DomainException.
     * @param string $alpha3
     * @dataProvider invalidAlpha3Provider
     * @expectedException \DomainException
     * @expectedExceptionMessageRegExp /^Not a valid alpha3: .*$/
     */
    public function testGetByAlpha3Invalid($alpha3)
    {
        $iso3166 = new ISO3166();
        $iso3166->getByAlpha3($alpha3);
    }

    /**
     * @testdox Calling getByAlpha3 with an unknown alpha3 throws a OutOfBoundsException.
     * @expectedException \OutOfBoundsException
     * @expectedExceptionMessage ISO 3166-1 does not contain: ZZZ
     */
    public function testGetByAlpha3Unknown()
    {
        $iso3166 = new ISO3166();
        $iso3166->getByAlpha3('ZZZ');
    }

    /**
     * @testdox Calling getByAlpha3 with a known alpha3 returns an associative array with the data.
     * @dataProvider alpha3Provider
     * @param string $alpha3
     * @param array $expected
     */
    public function testGetByAlpha3($alpha3, array $expected)
    {
        $iso3166 = new ISO3166();
        $this->assertEquals($expected, $iso3166->getByAlpha3($alpha3));
    }

    /**
     * @testdox Calling getByNumeric with an invalid numeric throws a DomainException.
     * @param string $numeric
     * @dataProvider invalidNumericProvider
     * @expectedException \DomainException
     * @expectedExceptionMessageRegExp /^Not a valid numeric: .*$/
     */
    public function testGetByNumericInvalid($numeric)
    {
        $iso3166 = new ISO3166();
        $iso3166->getByNumeric($numeric);
    }

    /**
     * @testdox Calling getByNumeric with an unknown numeric throws a OutOfBoundsException.
     * @expectedException \OutOfBoundsException
     * @expectedExceptionMessage ISO 3166-1 does not contain: 000
     */
    public function testGetByNumericUnknown()
    {
        $iso3166 = new ISO3166();
        $iso3166->getByNumeric('000');
    }

    /**
     * @testdox Calling getByNumeric with a known numeric returns an associative array with the data.
     * @dataProvider numericProvider
     * @param string $numeric
     * @param array $expected
     */
    public function testGetByNumeric($numeric, $expected)
    {
        $iso3166 = new ISO3166();
        $this->assertEquals($expected, $iso3166->getByNumeric($numeric));
    }

    /**
     * @testdox Calling getAll returns an array with all elements.
     */
    public function testGetAll()
    {
        $iso3166 = new ISO3166();
        $this->assertInternalType('array', $iso3166->getAll());
        $this->assertCount(249, $iso3166->getAll());
    }

    public function testAgainstArray()
    {
        $iso3166 = new ISO3166();
        $scraped = [
            ['Afghanistan', 'AF', 'Officially assigned'],
            ['Åland Islands', 'AX', 'Officially assigned'],
            ['Albania', 'AL', 'Officially assigned'],
            ['Algeria', 'DZ', 'Officially assigned'],
            ['American Samoa', 'AS', 'Officially assigned'],
            ['Andorra', 'AD', 'Officially assigned'],
            ['Angola', 'AO', 'Officially assigned'],
            ['Anguilla', 'AI', 'Officially assigned'],
            ['Antarctica', 'AQ', 'Officially assigned'],
            ['Antigua and Barbuda', 'AG', 'Officially assigned'],
            ['Argentina', 'AR', 'Officially assigned'],
            ['Armenia', 'AM', 'Officially assigned'],
            ['Aruba', 'AW', 'Officially assigned'],
            ['Australia', 'AU', 'Officially assigned'],
            ['Austria', 'AT', 'Officially assigned'],
            ['Azerbaijan', 'AZ', 'Officially assigned'],
            ['Bahamas (the)', 'BS', 'Officially assigned'],
            ['Bahrain', 'BH', 'Officially assigned'],
            ['Bangladesh', 'BD', 'Officially assigned'],
            ['Barbados', 'BB', 'Officially assigned'],
            ['Belarus', 'BY', 'Officially assigned'],
            ['Belgium', 'BE', 'Officially assigned'],
            ['Belize', 'BZ', 'Officially assigned'],
            ['Benin', 'BJ', 'Officially assigned'],
            ['Bermuda', 'BM', 'Officially assigned'],
            ['Bhutan', 'BT', 'Officially assigned'],
            ['Bolivia (Plurinational State of)', 'BO', 'Officially assigned'],
            ['Bonaire, Sint Eustatius and Saba', 'BQ', 'Officially assigned'],
            ['Bosnia and Herzegovina', 'BA', 'Officially assigned'],
            ['Botswana', 'BW', 'Officially assigned'],
            ['Bouvet Island', 'BV', 'Officially assigned'],
            ['Brazil', 'BR', 'Officially assigned'],
            ['British Indian Ocean Territory (the)', 'IO', 'Officially assigned'],
            ['Brunei Darussalam', 'BN', 'Officially assigned'],
            ['Bulgaria', 'BG', 'Officially assigned'],
            ['Burkina Faso', 'BF', 'Officially assigned'],
            ['Burundi', 'BI', 'Officially assigned'],
            ['Cabo Verde', 'CV', 'Officially assigned'],
            ['Cambodia', 'KH', 'Officially assigned'],
            ['Cameroon', 'CM', 'Officially assigned'],
            ['Canada', 'CA', 'Officially assigned'],
            ['Cayman Islands (the)', 'KY', 'Officially assigned'],
            ['Central African Republic (the)', 'CF', 'Officially assigned'],
            ['Chad', 'TD', 'Officially assigned'],
            ['Chile', 'CL', 'Officially assigned'],
            ['China', 'CN', 'Officially assigned'],
            ['Christmas Island', 'CX', 'Officially assigned'],
            ['Cocos (Keeling) Islands (the)', 'CC', 'Officially assigned'],
            ['Colombia', 'CO', 'Officially assigned'],
            ['Comoros (the)', 'KM', 'Officially assigned'],
            ['Congo (the Democratic Republic of the)', 'CD', 'Officially assigned'],
            ['Congo (the)', 'CG', 'Officially assigned'],
            ['Cook Islands (the)', 'CK', 'Officially assigned'],
            ['Costa Rica', 'CR', 'Officially assigned'],
            ['Côte d\'Ivoire', 'CI', 'Officially assigned'],
            ['Croatia', 'HR', 'Officially assigned'],
            ['Cuba', 'CU', 'Officially assigned'],
            ['Curaçao', 'CW', 'Officially assigned'],
            ['Cyprus', 'CY', 'Officially assigned'],
            ['Czech Republic (the)', 'CZ', 'Officially assigned'],
            ['Denmark', 'DK', 'Officially assigned'],
            ['Djibouti', 'DJ', 'Officially assigned'],
            ['Dominica', 'DM', 'Officially assigned'],
            ['Dominican Republic (the)', 'DO', 'Officially assigned'],
            ['Ecuador', 'EC', 'Officially assigned'],
            ['Egypt', 'EG', 'Officially assigned'],
            ['El Salvador', 'SV', 'Officially assigned'],
            ['Equatorial Guinea', 'GQ', 'Officially assigned'],
            ['Eritrea', 'ER', 'Officially assigned'],
            ['Estonia', 'EE', 'Officially assigned'],
            ['Ethiopia', 'ET', 'Officially assigned'],
            ['Falkland Islands (the) [Malvinas]', 'FK', 'Officially assigned'],
            ['Faroe Islands (the)', 'FO', 'Officially assigned'],
            ['Fiji', 'FJ', 'Officially assigned'],
            ['Finland', 'FI', 'Officially assigned'],
            ['France', 'FR', 'Officially assigned'],
            ['French Guiana', 'GF', 'Officially assigned'],
            ['French Polynesia', 'PF', 'Officially assigned'],
            ['French Southern Territories (the)', 'TF', 'Officially assigned'],
            ['Gabon', 'GA', 'Officially assigned'],
            ['Gambia (the)', 'GM', 'Officially assigned'],
            ['Georgia', 'GE', 'Officially assigned'],
            ['Germany', 'DE', 'Officially assigned'],
            ['Ghana', 'GH', 'Officially assigned'],
            ['Gibraltar', 'GI', 'Officially assigned'],
            ['Greece', 'GR', 'Officially assigned'],
            ['Greenland', 'GL', 'Officially assigned'],
            ['Grenada', 'GD', 'Officially assigned'],
            ['Guadeloupe', 'GP', 'Officially assigned'],
            ['Guam', 'GU', 'Officially assigned'],
            ['Guatemala', 'GT', 'Officially assigned'],
            ['Guernsey', 'GG', 'Officially assigned'],
            ['Guinea', 'GN', 'Officially assigned'],
            ['Guinea-Bissau', 'GW', 'Officially assigned'],
            ['Guyana', 'GY', 'Officially assigned'],
            ['Haiti', 'HT', 'Officially assigned'],
            ['Heard Island and McDonald Islands', 'HM', 'Officially assigned'],
            ['Holy See (the)', 'VA', 'Officially assigned'],
            ['Honduras', 'HN', 'Officially assigned'],
            ['Hong Kong', 'HK', 'Officially assigned'],
            ['Hungary', 'HU', 'Officially assigned'],
            ['Iceland', 'IS', 'Officially assigned'],
            ['India', 'IN', 'Officially assigned'],
            ['Indonesia', 'ID', 'Officially assigned'],
            ['Iran (Islamic Republic of)', 'IR', 'Officially assigned'],
            ['Iraq', 'IQ', 'Officially assigned'],
            ['Ireland', 'IE', 'Officially assigned'],
            ['Isle of Man', 'IM', 'Officially assigned'],
            ['Israel', 'IL', 'Officially assigned'],
            ['Italy', 'IT', 'Officially assigned'],
            ['Jamaica', 'JM', 'Officially assigned'],
            ['Japan', 'JP', 'Officially assigned'],
            ['Jersey', 'JE', 'Officially assigned'],
            ['Jordan', 'JO', 'Officially assigned'],
            ['Kazakhstan', 'KZ', 'Officially assigned'],
            ['Kenya', 'KE', 'Officially assigned'],
            ['Kiribati', 'KI', 'Officially assigned'],
            ['Korea (the Democratic People\'s Republic of)', 'KP', 'Officially assigned'],
            ['Korea (the Republic of)', 'KR', 'Officially assigned'],
            ['Kuwait', 'KW', 'Officially assigned'],
            ['Kyrgyzstan', 'KG', 'Officially assigned'],
            ['Lao People\'s Democratic Republic (the)', 'LA', 'Officially assigned'],
            ['Latvia', 'LV', 'Officially assigned'],
            ['Lebanon', 'LB', 'Officially assigned'],
            ['Lesotho', 'LS', 'Officially assigned'],
            ['Liberia', 'LR', 'Officially assigned'],
            ['Libya', 'LY', 'Officially assigned'],
            ['Liechtenstein', 'LI', 'Officially assigned'],
            ['Lithuania', 'LT', 'Officially assigned'],
            ['Luxembourg', 'LU', 'Officially assigned'],
            ['Macao', 'MO', 'Officially assigned'],
            ['Madagascar', 'MG', 'Officially assigned'],
            ['Malawi', 'MW', 'Officially assigned'],
            ['Malaysia', 'MY', 'Officially assigned'],
            ['Maldives', 'MV', 'Officially assigned'],
            ['Mali', 'ML', 'Officially assigned'],
            ['Malta', 'MT', 'Officially assigned'],
            ['Marshall Islands (the)', 'MH', 'Officially assigned'],
            ['Martinique', 'MQ', 'Officially assigned'],
            ['Mauritania', 'MR', 'Officially assigned'],
            ['Mauritius', 'MU', 'Officially assigned'],
            ['Mayotte', 'YT', 'Officially assigned'],
            ['Mexico', 'MX', 'Officially assigned'],
            ['Micronesia (Federated States of)', 'FM', 'Officially assigned'],
            ['Moldova (the Republic of)', 'MD', 'Officially assigned'],
            ['Monaco', 'MC', 'Officially assigned'],
            ['Mongolia', 'MN', 'Officially assigned'],
            ['Montenegro', 'ME', 'Officially assigned'],
            ['Montserrat', 'MS', 'Officially assigned'],
            ['Morocco', 'MA', 'Officially assigned'],
            ['Mozambique', 'MZ', 'Officially assigned'],
            ['Myanmar', 'MM', 'Officially assigned'],
            ['Namibia', 'NA', 'Officially assigned'],
            ['Nauru', 'NR', 'Officially assigned'],
            ['Nepal', 'NP', 'Officially assigned'],
            ['Netherlands (the)', 'NL', 'Officially assigned'],
            ['New Caledonia', 'NC', 'Officially assigned'],
            ['New Zealand', 'NZ', 'Officially assigned'],
            ['Nicaragua', 'NI', 'Officially assigned'],
            ['Niger (the)', 'NE', 'Officially assigned'],
            ['Nigeria', 'NG', 'Officially assigned'],
            ['Niue', 'NU', 'Officially assigned'],
            ['Norfolk Island', 'NF', 'Officially assigned'],
            ['Northern Mariana Islands (the)', 'MP', 'Officially assigned'],
            ['Norway', 'NO', 'Officially assigned'],
            ['Oman', 'OM', 'Officially assigned'],
            ['Pakistan', 'PK', 'Officially assigned'],
            ['Palau', 'PW', 'Officially assigned'],
            ['Palestine, State of', 'PS', 'Officially assigned'],
            ['Panama', 'PA', 'Officially assigned'],
            ['Papua New Guinea', 'PG', 'Officially assigned'],
            ['Paraguay', 'PY', 'Officially assigned'],
            ['Peru', 'PE', 'Officially assigned'],
            ['Philippines (the)', 'PH', 'Officially assigned'],
            ['Pitcairn', 'PN', 'Officially assigned'],
            ['Poland', 'PL', 'Officially assigned'],
            ['Portugal', 'PT', 'Officially assigned'],
            ['Puerto Rico', 'PR', 'Officially assigned'],
            ['Qatar', 'QA', 'Officially assigned'],
            ['Réunion', 'RE', 'Officially assigned'],
            ['Romania', 'RO', 'Officially assigned'],
            ['Russian Federation (the)', 'RU', 'Officially assigned'],
            ['Rwanda', 'RW', 'Officially assigned'],
            ['Saint Barthélemy', 'BL', 'Officially assigned'],
            ['Saint Helena, Ascension and Tristan da Cunha', 'SH', 'Officially assigned'],
            ['Saint Kitts and Nevis', 'KN', 'Officially assigned'],
            ['Saint Lucia', 'LC', 'Officially assigned'],
            ['Saint Martin (French part)', 'MF', 'Officially assigned'],
            ['Saint Pierre and Miquelon', 'PM', 'Officially assigned'],
            ['Saint Vincent and the Grenadines', 'VC', 'Officially assigned'],
            ['Samoa', 'WS', 'Officially assigned'],
            ['San Marino', 'SM', 'Officially assigned'],
            ['Sao Tome and Principe', 'ST', 'Officially assigned'],
            ['Saudi Arabia', 'SA', 'Officially assigned'],
            ['Senegal', 'SN', 'Officially assigned'],
            ['Serbia', 'RS', 'Officially assigned'],
            ['Seychelles', 'SC', 'Officially assigned'],
            ['Sierra Leone', 'SL', 'Officially assigned'],
            ['Singapore', 'SG', 'Officially assigned'],
            ['Sint Maarten (Dutch part)', 'SX', 'Officially assigned'],
            ['Slovakia', 'SK', 'Officially assigned'],
            ['Slovenia', 'SI', 'Officially assigned'],
            ['Solomon Islands', 'SB', 'Officially assigned'],
            ['Somalia', 'SO', 'Officially assigned'],
            ['South Africa', 'ZA', 'Officially assigned'],
            ['South Georgia and the South Sandwich Islands', 'GS', 'Officially assigned'],
            ['South Sudan', 'SS', 'Officially assigned'],
            ['Spain', 'ES', 'Officially assigned'],
            ['Sri Lanka', 'LK', 'Officially assigned'],
            ['Sudan (the)', 'SD', 'Officially assigned'],
            ['Suriname', 'SR', 'Officially assigned'],
            ['Svalbard and Jan Mayen', 'SJ', 'Officially assigned'],
            ['Swaziland', 'SZ', 'Officially assigned'],
            ['Sweden', 'SE', 'Officially assigned'],
            ['Switzerland', 'CH', 'Officially assigned'],
            ['Syrian Arab Republic', 'SY', 'Officially assigned'],
            ['Taiwan (Province of China)', 'TW', 'Officially assigned'],
            ['Tajikistan', 'TJ', 'Officially assigned'],
            ['Tanzania, United Republic of', 'TZ', 'Officially assigned'],
            ['Thailand', 'TH', 'Officially assigned'],
            ['Timor-Leste', 'TL', 'Officially assigned'],
            ['Togo', 'TG', 'Officially assigned'],
            ['Tokelau', 'TK', 'Officially assigned'],
            ['Tonga', 'TO', 'Officially assigned'],
            ['Trinidad and Tobago', 'TT', 'Officially assigned'],
            ['Tunisia', 'TN', 'Officially assigned'],
            ['Turkey', 'TR', 'Officially assigned'],
            ['Turkmenistan', 'TM', 'Officially assigned'],
            ['Turks and Caicos Islands (the)', 'TC', 'Officially assigned'],
            ['Tuvalu', 'TV', 'Officially assigned'],
            ['Uganda', 'UG', 'Officially assigned'],
            ['Ukraine', 'UA', 'Officially assigned'],
            ['United Arab Emirates (the)', 'AE', 'Officially assigned'],
            ['United Kingdom of Great Britain and Northern Ireland (the)', 'GB', 'Officially assigned'],
            ['United States Minor Outlying Islands (the)', 'UM', 'Officially assigned'],
            ['United States of America (the)', 'US', 'Officially assigned'],
            ['Uruguay', 'UY', 'Officially assigned'],
            ['Uzbekistan', 'UZ', 'Officially assigned'],
            ['Vanuatu', 'VU', 'Officially assigned'],
            ['Venezuela (Bolivarian Republic of)', 'VE', 'Officially assigned'],
            ['Viet Nam', 'VN', 'Officially assigned'],
            ['Virgin Islands (British)', 'VG', 'Officially assigned'],
            ['Virgin Islands (U.S.)', 'VI', 'Officially assigned'],
            ['Wallis and Futuna', 'WF', 'Officially assigned'],
            ['Western Sahara', 'EH', 'Officially assigned'],
            ['Yemen', 'YE', 'Officially assigned'],
            ['Zambia', 'ZM', 'Officially assigned'],
            ['Zimbabwe', 'ZW', 'Officially assigned'],
        ];

        foreach ($scraped as $array) {
            list($name, $alpha2, /* assigned */) = $array;
            $country = $iso3166->getByAlpha2($alpha2);
            $this->assertSame($name, $country['name']);
        }
    }

    /**
     * @return array
     */
    public function invalidAlpha2Provider()
    {
        return [['Z'], ['ZZZ'], [1], [123]];
    }

    /**
     * @return array
     */
    public function alpha2Provider()
    {
        return $this->getCountries('alpha2');
    }

    /**
     * @return array
     */
    public function invalidAlpha3Provider()
    {
        return [['ZZ'], ['ZZZZ'], [12], [1234]];
    }

    /**
     * @return array
     */
    public function alpha3Provider()
    {
        return $this->getCountries('alpha3');
    }

    /**
     * @return array
     */
    public function invalidNumericProvider()
    {
        return [['00'], ['0000'], ['ZZ'], ['ZZZZ']];
    }

    /**
     * @return array
     */
    public function numericProvider()
    {
        return $this->getCountries('numeric');
    }

    /**
     * @return array
     */
    private function getCountries($indexedBy)
    {
        $reflected = new \ReflectionClass('Alcohol\ISO3166');
        $countries = $reflected->getProperty('countries');
        $countries->setAccessible(true);
        $countries = $countries->getValue(new ISO3166());

        return array_reduce(
            $countries,
            function (array $carry, array $country) use ($indexedBy) {
                $carry[] = [$country[$indexedBy], $country];
                return $carry;
            },
            []
        );
    }
}
