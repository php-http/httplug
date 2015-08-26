# HTTP Client

[![Latest Version](https://img.shields.io/github/release/php-http/client.svg?style=flat-square)](https://github.com/php-http/client/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://img.shields.io/travis/php-http/client.svg?style=flat-square)](https://travis-ci.org/php-http/client)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/php-http/client.svg?style=flat-square)](https://scrutinizer-ci.com/g/php-http/client)
[![Quality Score](https://img.shields.io/scrutinizer/g/php-http/client.svg?style=flat-square)](https://scrutinizer-ci.com/g/php-http/client)
[![Total Downloads](https://img.shields.io/packagist/dt/php-http/client.svg?style=flat-square)](https://packagist.org/packages/php-http/client)

[![Gitter](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/php-http/adapter?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

**HTTP Client interfaces.**


## Install

Via Composer

``` bash
$ composer require php-http/client
```


## Usage

This is the contract package for HTTP Client interfacess. PSR-7 does not contain Client interfaces which is fine. However there is still need for HTTP Client interoperability.

These interfaces are mostly used to create adapter packages around existing HTTP Client implementations.

There is also a virtual package which is versioned together with this contract package: [php-http/client-implementation](https://packagist.org/providers/php-http/client-implementation).


## Documentation

Please see the [official documentation](http://php-http.readthedocs.org/en/latest/).


## Testing

``` bash
$ composer test
```


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


## Security

If you discover any security related issues, please contact us at [security@php-http.org](mailto:security@php-http.org).


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
