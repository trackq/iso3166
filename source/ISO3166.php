<?php

namespace Alcohol;

class ISO3166
{
    /**
     * @var array
     */
    protected static $countries = array();

    /**
     * @param string $code
     * @return array
     * @throws \RuntimeException
     */
    public static function getByCode($code)
    {
        $countries = self::getAll();

        foreach ($countries as $country) {
            if (0 === strcasecmp($code, $country['alpha2']) ||
                0 === strcasecmp($code, $country['alpha3'])) {
                return $country;
            }
        }

        throw new \RuntimeException('No data found for: ' . $code);
    }

    /**
     * @param string $alpha2
     * @return array
     * @throws \InvalidArgumentException
     */
    public static function getByAlpha2($alpha2)
    {
        if (!preg_match('/^[a-zA-Z]{2}$/', $alpha2)) {
            throw new \InvalidArgumentException('Not a valid alpha2: ' . $alpha2);
        }

        return self::getByCode($alpha2);
    }

    /**
     * @param string $alpha3
     * @return array
     * @throws \InvalidArgumentException
     */
    public static function getByAlpha3($alpha3)
    {
        if (!preg_match('/^[a-zA-Z]{3}$/', $alpha3)) {
            throw new \InvalidArgumentException('Not a valid alpha3: ' . $alpha3);
        }

        return self::getByCode($alpha3);
    }

    /**
     * @param string $numeric
     * @return array
     * @throws \RuntimeException
     */
    public static function getByNumeric($numeric)
    {
        if (!preg_match('/^[0-9]{3}$/', $numeric)) {
            throw new \InvalidArgumentException('Not a valid numeric: ' . $numeric);
        }

        $countries = self::getAll();

        foreach ($countries as $country) {
            if (0 === strcasecmp($numeric, $country['numeric'])) {
                return $country;
            }
        }

        throw new \RuntimeException('No data found for: ' . $numeric);
    }

    /**
     * @return array
     */
    public static function getAll()
    {
        if (empty(self::$countries)) {
            self::load();
        }

        return self::$countries;
    }

    /**
     * @param array $countries
     */
    public static function load(array $countries = array())
    {
        if (empty($countries)) {
            $countries = self::fromDataDir();
        }

        self::$countries = $countries;
    }

    /**
     * @return array
     */
    final protected static function fromDataDir()
    {
        $countries = require __DIR__ . '/../data/iso3166.php';

        return $countries;
    }
}
