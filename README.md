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

## Custom Error Message

Additionally, you can specify the error message on the fly when declaring the rules. Simple pass the message parameter.

```php
use Arifszn\AdvancedValidation\Rules\Base64Image;

public function rules()
{
    return [
        'avatar' => [new Base64Image('Your custom message')],
    ];
}
```

## Available Validation Rules

- [`Base64 Image`](#base64_image)
- [`Base64 String`](#base64_string)
- [`Phone`](#phone)
- [`Without Spaces`](#without-spaces)


<a name="base64_image"></a>
### `Base64Image`

The field under validation must be Base64 encoded image.

```php
use Arifszn\AdvancedValidation\Rules\Base64Image;

public function rules()
{
    return [
        'avatar' => [new Base64Image()],
    ];
}
```

<a name="base64_string"></a>
### `Base64String`

The field under validation must be Base64 encoded string.

```php
use Arifszn\AdvancedValidation\Rules\Base64String;

public function rules()
{
    return [
        'foo' => [new Base64String()],
    ];
}
```

<a name="phone"></a>
### `Phone`

The field under validation must be a valid phone number.

✓ +1-202-555-0125 \
✓ +12025550125 \
✓ (508) 555-0125 \
✓ 5085550125

```php
use Arifszn\AdvancedValidation\Rules\Phone;

public function rules()
{
    return [
        'phone' => [new Phone()],
    ];
}
```

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

## Tips

If you want to use the rules as strings and use them globally e.g. `'foo' => ['base64_string']`, you can do so by adding them to the boot method of your project's **AppServiceProvider**.

```php
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Arifszn\AdvancedValidation\Rules\Base64String;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Validator::extend(
            'base64_string',
            'Arifszn\AdvancedValidation\Rules\Base64String@passes',
            (new Base64String())->message()
        );
    }
}
```

## Testing

```bash
composer test
```

## Contributing

Any contributors who want to make this project better can make contributions, which will be greatly appreciated. To contribute, clone this repo locally and commit your code to a new branch. Feel free to create an issue or make a pull request.


## Support

If you are using this package and happy with it or just want to encourage me to continue creating stuff, you can do it by just starring and sharing the project.


## License

This package is licensed under the [MIT License](https://github.com/arifszn/laravel-advanced-validation/blob/main/LICENSE).