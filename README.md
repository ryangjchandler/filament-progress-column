# Add a progress bar column to your Filament tables.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ryangjchandler/filament-progress-column.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/filament-progress-column)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/ryangjchandler/filament-progress-column/run-tests?label=tests)](https://github.com/ryangjchandler/filament-progress-column/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/ryangjchandler/filament-progress-column/Check%20&%20fix%20styling?label=code%20style)](https://github.com/ryangjchandler/filament-progress-column/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ryangjchandler/filament-progress-column.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/filament-progress-column)

This package provides a `ProgessColumn` that can be used to display a progress bar in a Filament table.

## Installation

You can install the package via Composer:

```bash
composer require ryangjchandler/filament-progress-column
```

If you're **not** using the `filament/admin` package, you should also add the following line to the top of your CSS:

```css
@import '../../vendor/ryangjchandler/filament-progress-column/resources/dist/progress.css'
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-progress-column-views"
```

## Usage

Add the `ProgressColumn` to your table:

```php
use RyanChandler\FilamentProgressColumn\ProgressColumn;

protected function getTableColumns(): array
{
    return [
        ProgressColumn::make('progress'),
    ];
}
```

This will render a progress bar and used the value of `$record->progress` as the current progress. If you wish to calculate the progress dynamically, provide a `Closure` to the `ProgressColumn::progress()` method.

```php
protected function getTableColumns(): array
{
    return [
        ProgressColumn::make('progress')
            ->progress(function ($record) {
                return ($record->rows_complete / $record->total_rows) * 100;
            }),
    ];
}
```

By default, the progress bar will be the same as your `primary` color. If you wish to change this, provide a new string to `ProgressBar::color()`.

```php
protected function getTableColumns(): array
{
    return [
        ProgressColumn::make('progress')
            ->color('warning'),
    ];
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ryan Chandler](https://github.com/ryangjchandler)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
