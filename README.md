# HTTPlug

[![Latest Version](https://img.shields.io/github/release/php-http/httplug.svg?style=flat-square)](https://github.com/php-http/httplug/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://img.shields.io/travis/php-http/httplug/master.svg?style=flat-square)](https://travis-ci.org/php-http/httplug)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/php-http/httplug.svg?style=flat-square)](https://scrutinizer-ci.com/g/php-http/httplug)
[![Quality Score](https://img.shields.io/scrutinizer/g/php-http/httplug.svg?style=flat-square)](https://scrutinizer-ci.com/g/php-http/httplug)
[![Total Downloads](https://img.shields.io/packagist/dt/php-http/httplug.svg?style=flat-square)](https://packagist.org/packages/php-http/httplug)

[![Slack Status](http://slack.httplug.io/badge.svg)](http://slack.httplug.io)
[![Email](https://img.shields.io/badge/email-team@httplug.io-blue.svg?style=flat-square)](mailto:team@httplug.io)

**HTTPlug, the HTTP client abstraction for PHP.**


## Intro

HTTPlug is the predecessor of [PSR-18](http://www.php-fig.org/psr/psr-18/)
HTTP Client standard built on [PSR-7](http://www.php-fig.org/psr/psr-7/) HTTP messages.
Since there is an entire ecosystem built around HTTPlug which is already widely adopted,
we will keep maintaining this package for the time being,
but new implementations and consumers should use the PSR-18 interfaces.
HTTPlug 2.x extends the PSR-18 interfaces to allow a convenient migration path.
In the long term, we expect PSR-18 to completely replace the need for HTTPlug.

This library is the official successor of the [ivory http adapter](https://github.com/egeloen/ivory-http-adapter).


## Install

Via Composer

``` bash
$ composer require php-http/httplug
```


## Documentation

Please see the [official documentation](http://docs.php-http.org).


## Testing

``` bash
$ composer test
```


## Contributing

Please see our [contributing guide](http://docs.php-http.org/en/latest/development/contributing.html).


## Security

If you discover any security related issues, please contact us at [security@php-http.org](mailto:security@php-http.org).


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
