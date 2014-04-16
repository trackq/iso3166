[![Build Status](https://travis-ci.org/alcohol/iso3166.png?branch=master)](https://travis-ci.org/alcohol/iso3166)

# CountryList

Example:

```php
use Alcohol\ISO3166;

ISO3166::getByAlpha2('NL');
 // or
ISO3166::getByAlpha3('NLD');
 // or
ISO3166::getByNumeric('528');
```

Result:

```
Array
(
    [alpha2] => NL
    [alpha3] => NLD
    [numeric] => 528
    [name] => Netherlands (the)
    [currency] => EUR
)
```
