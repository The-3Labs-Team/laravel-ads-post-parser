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

First, add your ADS content in one of `/resources/views/adsX.blade.php` file.

Then, use the `AdsPostParser` class to append advertising to your post:

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
- [voku](https://github.com/voku) - Creator of portable-utf8 and simple_html_dom packages
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Sponsor

<div>  
    <a href="https://www.tomshw.it/" target="_blank" rel="noopener noreferrer">
        <img  src="https://3labs-assets.b-cdn.net/assets/logos/banner-github/toms.png" alt="Tom's Hardware - Notizie, recensioni, guide all'acquisto e approfondimenti per tutti gli appassionati di computer, smartphone, videogiochi, film, serie tv, gadget e non solo" />  
    </a>
    <a href="https://spaziogames.it/" target="_blank" rel="noopener noreferrer" >
        <img src="https://3labs-assets.b-cdn.net/assets/logos/banner-github/spazio.png" alt="Spaziogames - Tutto sul mondo dei videogiochi. Troverai tantissime anteprime, recensioni, notizie dei giochi per tutte le console, PC, iPhone e Android." />
    </a>
    <br/>
    <a href="https://cpop.it/" target="_blank" rel="noopener noreferrer" >
        <img src="https://3labs-assets.b-cdn.net/assets/logos/banner-github/cpop.png" alt="Cpop - News, recensioni, guide su fumetto, cinema & serie TV, gioco da tavolo e di ruolo e collezionismo. Tutto quello di cui hai bisogno per rimanere aggiornato sul mondo della cultura pop"/>
    </a>
    <a href="https://data4biz.com/" target="_blank" rel="noopener noreferrer" >
        <img src="https://3labs-assets.b-cdn.net/assets/logos/banner-github/d4b.png" alt="Data4Biz - Sito dedicato alla trasformazione digitale del business" />
    </a>
    <br/>
    <a href="https://soshomegarden.com/" target="_blank" rel="noopener noreferrer" >
        <img src="https://3labs-assets.b-cdn.net/assets/logos/banner-github/sos.png" alt="SOS Home & Garden - Realtà dedicata a 360 gradi ai settori della casa e del giardino." />
    </a>
    <a href="https://global.techradar.com/it-it" target="_blank" rel="noopener noreferrer" >
        <img src="https://3labs-assets.b-cdn.net/assets/logos/banner-github/techradar.png" alt="Techradar - Le ultime notizie e recensioni dal mondo della tecnologia, su computer, sistemi per la casa, gadget e altro." />
    </a>
    <br/>
    <a href="https://aibay.it/" target="_blank" rel="noopener noreferrer" >
        <img src="https://3labs-assets.b-cdn.net/assets/logos/banner-github/aibay.png" alt="Aibay - Scopri AiBay, il leader delle notizie sull'intelligenza artificiale. Resta aggiornato sulle ultime innovazioni, ricerche e tendenze del mondo AI con approfondimenti, interviste esclusive e analisi dettagliate." />
    </a>
    <a href="https://coinlabs.it/" target="_blank" rel="noopener noreferrer" >
        <img src="https://3labs-assets.b-cdn.net/assets/logos/banner-github/coinlabs.png" alt="Coinlabs - Notizie, analisi approfondite, guide e opinioni aggiornate sul mondo delle criptovalute, blockchain e finanza" />
    </a>

</div>
