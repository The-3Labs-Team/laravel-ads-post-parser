# Laravel ADS Post Parser

[![Latest Version on Packagist](https://img.shields.io/packagist/v/the-3labs-team/laravel-ads-post-parser.svg?style=flat-square)](https://packagist.org/packages/the-3labs-team/laravel-ads-post-parser)
[![Fix PHP code style issues](https://github.com/The-3Labs-Team/laravel-ads-post-parser/actions/workflows/fix-php-code-style-issues.yml/badge.svg)](https://github.com/The-3Labs-Team/laravel-ads-post-parser/actions/workflows/fix-php-code-style-issues.yml)
[![PHPStan](https://github.com/The-3Labs-Team/laravel-ads-post-parser/actions/workflows/phpstan.yml/badge.svg)](https://github.com/The-3Labs-Team/laravel-ads-post-parser/actions/workflows/phpstan.yml)
[![run-tests](https://github.com/The-3Labs-Team/laravel-ads-post-parser/actions/workflows/run-tests.yml/badge.svg)](https://github.com/The-3Labs-Team/laravel-ads-post-parser/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/the-3labs-team/laravel-ads-post-parser.svg?style=flat-square)](https://packagist.org/packages/the-3labs-team/laravel-ads-post-parser)

This package allows you to append advertising to your posts.

Main features:
- Append advertising to your posts with a specific frequency
- Can bypass advertising between no-paragrahps content
- You can set thresholds to avoid breaking your post layout

## Installation

You can install the package via composer.json:

```bash
  "require": {
    //..
    "the-3labs-team/laravel-ads-post-parser": "dev-main",
    }
    
    "repositories": {
      //..
        "the-3labs-team/laravel-ads-post-parser":
        } {
            "type": "vcs",
            "url": "https://github.com/The-3Labs-Team/laravel-ads-post-parser.git"
        }
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-ads-post-parser-config"
```

You can publish the views using

```bash
php artisan vendor:publish --tag="laravel-ads-post-parser-views"
```

## Usage

```php
$parsedContent = (new AdsPostParser($content))->appendAdvertising();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Stefano Novelli](https://github.com/The-3Labs-Team)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
