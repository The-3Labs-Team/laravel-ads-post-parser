# Supercharge Your Content Monetization with Laravel ADS Post Parser

[![Latest Version on Packagist](https://img.shields.io/packagist/v/the-3labs-team/laravel-ads-post-parser.svg?style=flat-square)](https://packagist.org/packages/the-3labs-team/laravel-ads-post-parser)
[![Fix PHP code style issues](https://github.com/The-3Labs-Team/laravel-ads-post-parser/actions/workflows/fix-php-code-style-issues.yml/badge.svg)](https://github.com/The-3Labs-Team/laravel-ads-post-parser/actions/workflows/fix-php-code-style-issues.yml)
[![PHPStan](https://github.com/The-3Labs-Team/laravel-ads-post-parser/actions/workflows/phpstan.yml/badge.svg)](https://github.com/The-3Labs-Team/laravel-ads-post-parser/actions/workflows/phpstan.yml)
[![run-tests](https://github.com/The-3Labs-Team/laravel-ads-post-parser/actions/workflows/run-tests.yml/badge.svg)](https://github.com/The-3Labs-Team/laravel-ads-post-parser/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/the-3labs-team/laravel-ads-post-parser.svg?style=flat-square)](https://packagist.org/packages/the-3labs-team/laravel-ads-post-parser)

Laravel ADS Post Parser is a powerful and flexible package that revolutionizes the way you integrate advertisements into your Laravel-powered content. Whether you're running a blog, news site, or any content-rich platform, this package offers a seamless solution to boost your revenue without compromising user experience.

<p align="center"><img src="https://github.com/the-3labs-team/laravel-ads-post-parser/raw/HEAD/art/how-it-works.png" width="100%" alt="Logo Laravel ADS Post Parser"></p>

### 🚀 Key Features

- **Intelligent Ad Insertion**: Automatically append advertisements to your posts with customizable frequency, ensuring optimal ad placement for maximum engagement.
- **Content-Aware Parsing**: Our smart parser respects your content structure, avoiding disruption of crucial elements like headings, images, or code blocks.
- **Flexible Threshold Settings**: Fine-tune your ad insertion strategy with customizable thresholds, maintaining the perfect balance between monetization and readability.
- **Seamless Integration**: Designed to work harmoniously with Laravel, requiring minimal setup and configuration.
- **Performance Optimized**: Built with efficiency in mind, ensuring fast page loads even with dynamic ad insertions.
- **Customizable Ad Templates**: Easily create and manage your ad templates to match your site's look and feel.

### 💡 Why Choose Laravel ADS Post Parser?

- **Boost Revenue**: Maximize your content monetization potential with strategically placed advertisements.
- **Maintain User Experience**: Our intelligent parsing ensures ads are placed naturally within your content, preserving readability and user engagement.
- **Save Time**: Automate the tedious process of manually inserting ads into your content.
- **Stay in Control**: Extensive configuration options allow you to tailor the ad insertion process to your specific needs.
- **Future-Proof**: Regular updates and compatibility with the latest Laravel versions keep your monetization strategy ahead of the curve.

### 🛠 Easy to Use, Powerful to Implement

With a simple setup process and intuitive API, you can start monetizing your content in minutes. The Laravel ADS Post Parser seamlessly integrates with your existing Laravel projects, providing a robust foundation for your advertising strategy.

Transform your content into a revenue-generating powerhouse with Laravel ADS Post Parser – where intelligent ad insertion meets effortless implementation.

## Installation

You can install the package via composer.json:

```bash
composer require the-3labs-team/laravel-ads-post-parser
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

You must encapsulate your post content in a `div` tag with the id `adv__parsed__content`:

```html
<div id="adv__parsed__content">
    {!! $parsedContent !!}
</div>
```

Then you can use the `AdsPostParser` class to append advertising to your post:

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