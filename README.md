# Alcohol\ISO3166

A PHP library providing ISO 3166-1 data.

[![Latest Stable Version](https://poser.pugx.org/alcohol/iso3166/v/stable.png)](https://packagist.org/packages/alcohol/iso3166)
[![Build Status](https://travis-ci.org/alcohol/iso3166.svg?branch=master)](https://travis-ci.org/alcohol/iso3166)

## What is ISO3166-1

> ISO 3166-1 is part of the ISO 3166 standard published by the International Organization for Standardization (ISO), and defines codes for the names of countries, dependent territories, and special areas of geographical interest. The official name of the standard is Codes for the representation of names of countries and their subdivisions – Part 1: Country codes. It defines three sets of country codes:
> * ISO 3166-1 alpha-2 – two-letter country codes which are the most widely used of the three, and used most prominently for the Internet's country code top-level domains (with a few exceptions).
> * ISO 3166-1 alpha-3 – three-letter country codes which allow a better visual association between the codes and the country names than the alpha-2 codes.
> * ISO 3166-1 numeric – three-digit country codes which are identical to those developed and maintained by the United Nations Statistics Division, with the advantage of script (writing system) independence, and hence useful for people or systems using non-Latin scripts.
>
> *-- [Wikipedia](http://en.wikipedia.org/wiki/ISO_3166-1)*

## Installing

Either install directly from command line using composer:

``` sh
$ composer require "alcohol/iso3166:~2.0@dev"
```

or manually include it as a dependency in your composer.json:

``` javascript
{
    "require": {
        "alcohol/iso3166": "~2.0@dev"
    }
}
```

## Using

Code:

``` php
<?php

$iso3166 = new Alcohol\ISO3166;

$iso3166->getByAlpha2('NL');
 // or
$iso3166->getByAlpha3('NLD');
 // or
$iso3166->getByNumeric('528');
```

Result:

```
Array
(
    [name] => Netherlands
    [alpha2] => NL
    [alpha3] => NLD
    [numeric] => 528
    [currency] => EUR
)
```

## Contributing

Feel free to submit a pull request or create an issue.

## License

Alcohol\ISO3166 is licensed under the MIT license.
