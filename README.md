# A simple package to enable image alt tag label detection with AWS Rekognition

[![Latest Version on Packagist](https://img.shields.io/packagist/v/laravelgeekphp/laravel-rekognition.svg?style=flat-square)](https://packagist.org/packages/laravelgeekphp/laravel-rekognition)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/laravelgeekphp/laravel-rekognition/run-tests?label=tests)](https://github.com/laravelgeekphp/laravel-rekognition/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/laravelgeekphp/laravel-rekognition/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/laravelgeekphp/laravel-rekognition/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/laravelgeekphp/laravel-rekognition.svg?style=flat-square)](https://packagist.org/packages/laravelgeekphp/laravel-rekognition)

This is a simple open-source Laravel Package. It's only purpose is to provide a Facade for getting image labels using AWS Rekognition.
Example usage is below, currently only file paths are supported. You pass the path of a file and under the hood the contents of said
file is retrieved using Storage facade. The result it passed to Rekognition using HTTP client and image labels are returned.
## Support us

You can support us by reading our [blog](https://laravelgeek.com)

## Installation

You can install the package via composer:

```bash
composer require laravelgeekphp/laravel-rekognition
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-rekognition-config"
```

This is the contents of the published config file:

```php
return [
    'key'    => env('AWS_ACCESS_KEY_ID'),
    'secret' => env('AWS_SECRET_ACCESS_KEY'),
    'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
];
```

## Usage

```php
use \LaravelGeek\LaravelRekognition\Facades\Rekognition;
use Illuminate\Support\Facades\Storage;

$imageLabels = Rekognition::getFromFilePath(Storage::path($mediaPath));
// do something with your labels
```

## Testing

```bash
composer test
```

## Changelog

This is currently the first version ever published, there is no changelog yet.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

If you discover any security related issues, please email info@laravelgeek.com instead of using the issue tracker.

## Credits

- [Taylor Perkins](https://github.com/jtperkins)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
