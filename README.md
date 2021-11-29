<h1 align="center">Laravel Advanced Validation</h1>
<p align="center">Laravel advanced validation rules for real-life scenarios.</p>
<p align="center">
    <a href="https://packagist.org/packages/arifszn/laravel-advanced-validation"><img src="https://img.shields.io/packagist/v/arifszn/laravel-advanced-validation"/></a>
    <a href="https://github.com/arifszn/laravel-advanced-validation/blob/main/LICENSE"><img src="https://img.shields.io/github/license/arifszn/laravel-advanced-validation"/></a>
</p>


## Installation

Install via <a href="https://packagist.org/packages/arifszn/laravel-advanced-validation">composer</a>

```bash
composer require arifszn/laravel-advanced-validation
```

Laravel uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.


## Translations

If you wish to edit the package translations, you can run the following command to publish them into your `resources/lang` folder

```bash
php artisan vendor:publish --provider="Arifszn\AdvancedValidation\ServiceProvider"
```


## Available Validation Rules

- [`Without Spaces`](#without-spaces)


<a name="without-spaces"></a>
### `WithoutSpaces`

The field under validation must not contain spaces.

```php
use Arifszn\AdvancedValidation\Rules\WithoutSpaces;

public function rules()
{
    return [
        'foo' => [new WithoutSpaces()],
    ];
}
```

## License

This package is licensed under the [MIT License](https://github.com/arifszn/laravel-advanced-validation/blob/main/LICENSE).