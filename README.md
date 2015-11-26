# alcohol/iso3166

A PHP library providing ISO 3166-1 data.

[![Build Status](https://img.shields.io/travis/alcohol/iso3166/master.svg?style=flat-square)](https://travis-ci.org/alcohol/iso3166)
[![License](https://img.shields.io/packagist/l/alcohol/iso3166.svg?style=flat-square)](https://packagist.org/packages/alcohol/iso3166)

## What is ISO 3166-1

> ISO 3166-1 is part of the ISO 3166 standard published by the International Organization for Standardization (ISO), and defines codes for the names of countries, dependent territories, and special areas of geographical interest. The official name of the standard is Codes for the representation of names of countries and their subdivisions – Part 1: Country codes. It defines three sets of country codes:
> * ISO 3166-1 alpha-2 – two-letter country codes which are the most widely used of the three, and used most prominently for the Internet's country code top-level domains (with a few exceptions).
> * ISO 3166-1 alpha-3 – three-letter country codes which allow a better visual association between the codes and the country names than the alpha-2 codes.
> * ISO 3166-1 numeric – three-digit country codes which are identical to those developed and maintained by the United Nations Statistics Division, with the advantage of script (writing system) independence, and hence useful for people or systems using non-Latin scripts.
>
> *-- [Wikipedia](http://en.wikipedia.org/wiki/ISO_3166-1)*

## Installing

``` sh
$ composer require alcohol/iso3166
```

## Using

Code:

``` php
<?php

use Alcohol\ISO3166\ISO3166;

$iso3166 = new ISO3166();

// methods defined by interface Alcohol\ISO3166\DataProvider
$iso3166->getByAlpha2('NL');
$iso3166->getByAlpha3('NLD');
$iso3166->getByNumeric('528');

// methods provided for convenience
array $iso3166->getAll();

// simple iterator implementation using a generator (uses alpha2 for keys)
foreach ($iso3166 as $key => $value) {
    // ...
}

// use a specific generator to iterate using other available keys, e.g.
foreach ($iso3166->listBy(ISO3166::KEY_ALPHA3) as $key => $value) {
    // ... constants available are KEY_ALPHA2, KEY_ALPHA3, KEY_NUMERIC
}
```

The array returned is in the format of:

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

alcohol/iso3166 is licensed under the MIT license.

## Source(s)

* [ISO 3166-1](http://en.wikipedia.org/wiki/ISO_3166-1) by [Wikipedia](http://www.wikipedia.org) licensed under [CC BY-SA 3.0 Unported License](http://en.wikipedia.org/wiki/Wikipedia:Text_of_Creative_Commons_Attribution-ShareAlike_3.0_Unported_License)
* [www.iso.org](http://www.iso.org)
