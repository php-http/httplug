# HTTPlug

[![Latest Version](https://img.shields.io/github/release/php-http/httplug.svg?style=flat-square)](https://github.com/php-http/httplug/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://img.shields.io/travis/php-http/httplug.svg?style=flat-square)](https://travis-ci.org/php-http/httplug)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/php-http/httplug.svg?style=flat-square)](https://scrutinizer-ci.com/g/php-http/httplug)
[![Quality Score](https://img.shields.io/scrutinizer/g/php-http/httplug.svg?style=flat-square)](https://scrutinizer-ci.com/g/php-http/httplug)
[![Total Downloads](https://img.shields.io/packagist/dt/php-http/httplug.svg?style=flat-square)](https://packagist.org/packages/php-http/httplug)

[![Slack Status](http://slack.httplug.io/badge.svg)](http://slack.httplug.io)
[![Email](https://img.shields.io/badge/email-team@httplug.io-blue.svg?style=flat-square)](mailto:team@httplug.io)

**HTTPlug, the HTTP client abstraction for PHP.**


## Install

Via Composer

``` bash
$ composer require php-http/httplug
```


## Intro

This is the contract package for HTTP Client.
Use it to create HTTP Clients which are interoperable and compatible with [PSR-7](http://www.php-fig.org/psr/psr-7/).

This library is the official successor of the [ivory http adapter](https://github.com/egeloen/ivory-http-adapter).

## Documentation

Please see the [official documentation](http://docs.php-http.org).

## Libraries using HTTPlug

There are many libraries using HTTPlug some of the most known ones are found in the list below. 

[![PHP Geocoder][geocoder_image]][geocoder]
[![Mailgun][mailgun_image]][mailgun]
[![FOSHttpCache][foshttp_image]][foshttp]
[![KNPLabs Github Api][knplabs_image]][knplabs]
[<img src="https://github.com/florianv/swap/raw/master/doc/logo.png" width="100px" />][swap]
[![Sparkpost][sparkpost_image]][sparkpost]

[geocoder]: https://github.com/geocoder-php/Geocoder
[mailgun]: https://github.com/mailgun/mailgun-php
[foshttp]: https://github.com/FriendsOfSymfony/FOSHttpCache
[knplabs]: https://github.com/KnpLabs/php-github-api
[swap]: https://github.com/florianv/swap
[sparkpost]: https://github.com/SparkPost/php-sparkpost
[geocoder_image]: https://avatars3.githubusercontent.com/u/5303359?v=3&s=100
[mailgun_image]: https://avatars0.githubusercontent.com/u/447686?v=3&s=100
[foshttp_image]: https://avatars2.githubusercontent.com/u/529709?v=3&s=100
[knplabs_image]: https://avatars3.githubusercontent.com/u/202732?v=3&s=100
[sparkpost_image]: https://avatars3.githubusercontent.com/u/9406778?v=3&s=100

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
