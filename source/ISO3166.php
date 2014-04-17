<?php

namespace Alcohol;

class ISO3166
{
    protected static $countries = null;

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

    public static function getByAlpha2($alpha2)
    {
        if (!preg_match('/[a-zA-Z]{2}/', $alpha2)) {
            throw new \InvalidArgumentException('Not a valid alpha2: ' . $alpha2);
        }

        return self::getByCode($alpha2);
    }

    public static function getByAlpha3($alpha3)
    {
        if (!preg_match('/[a-zA-Z]{3}/', $alpha3)) {
            throw new \InvalidArgumentException('Not a valid alpha3: ' . $alpha3);
        }

        return self::getByCode($alpha3);
    }

    public static function getByNumeric($numeric)
    {
        if (!preg_match('/[0-9]{3}/', $numeric)) {
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

    public static function getAll()
    {
        if (is_null(self::$countries)) {
            self::load();
        }

        return self::$countries;
    }

    public static function load(array $countries = array())
    {
        if (empty($countries)) {
            $countries = self::fromDataDir();
        }

        self::$countries = $countries;
    }

    final protected static function fromDataDir()
    {
        $json = file_get_contents(__DIR__.'/../data/iso3166.json');

        return json_decode($json, true);
    }
}
