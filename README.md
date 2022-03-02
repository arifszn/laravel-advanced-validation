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

You can specify the error message on the fly when declaring the rules. Simple pass the error message parameter.

```php
use Arifszn\AdvancedValidation\Rules\Base64Image;

public function rules()
{
    return [
        'avatar' => [new Base64Image('Your custom error message')],
    ];
}
```

## Available Validation Rules

- [`Ascii`](#ascii)
- [`Base64 Image`](#base64image)
- [`Base64 String`](#base64string)
- [`BIC`](#bic)
- [`Btc Address`](#btcaddress)
- [`Credit Card`](#creditcard)
- [`Data URI`](#datauri)
- [`Divisible By`](#divisibleby)
- [`Ethereum Address`](#ethereumaddress)
- [`Float Number`](#floatnumber)
- [`Hash`](#hash)
- [`Image URL`](#imageurl)
- [`Name`](#name)
- [`Phone`](#phone)
- [`Username`](#username)
- [`Without Spaces`](#withoutspaces)


### `Ascii`

The field under validation must contain ASCII chars only.

    public Arifszn\AdvancedValidation\Rules\Ascii::__construct(string $errorMessage = null)

```php
use Arifszn\AdvancedValidation\Rules\Ascii;

public function rules()
{
    return [
        'foo' => [new Ascii()],
    ];
}
```

### `Base64Image`

The field under validation must be a Base64 encoded image.

    public Arifszn\AdvancedValidation\Rules\Base64Image::__construct(string $errorMessage = null)

```php
use Arifszn\AdvancedValidation\Rules\Base64Image;

public function rules()
{
    return [
        'avatar' => [new Base64Image()],
    ];
}
```

### `Base64String`

The field under validation must be a Base64 encoded string.

    public Arifszn\AdvancedValidation\Rules\Base64String::__construct(string $errorMessage = null)

```php
use Arifszn\AdvancedValidation\Rules\Base64String;

public function rules()
{
    return [
        'foo' => [new Base64String()],
    ];
}
```

### `BIC`

The field under validation must be a BIC([Business Identifier Code](https://en.wikipedia.org/wiki/ISO_9362)) or SWIFT code.

    public Arifszn\AdvancedValidation\Rules\BIC::__construct(string $errorMessage = null)

```php
use Arifszn\AdvancedValidation\Rules\BIC;

public function rules()
{
    return [
        'foo' => [new BIC()],
    ];
}
```

### `BtcAddress`

The field under validation must be a valid BTC address.

    public Arifszn\AdvancedValidation\Rules\BtcAddress::__construct(string $errorMessage = null)

```php
use Arifszn\AdvancedValidation\Rules\BtcAddress;

public function rules()
{
    return [
        'foo' => [new BtcAddress()],
    ];
}
```

### `CreditCard`

The field under validation must be a valid credit card number.

    public Arifszn\AdvancedValidation\Rules\CreditCard::__construct(string $errorMessage = null)

```php
use Arifszn\AdvancedValidation\Rules\CreditCard;

public function rules()
{
    return [
        'foo' => [new CreditCard()],
    ];
}
```

### `DataURI`

The field under validation must have [data uri format](https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/Data_URIs).

    public Arifszn\AdvancedValidation\Rules\DataURI::__construct(string $errorMessage = null)

```php
use Arifszn\AdvancedValidation\Rules\DataURI;

public function rules()
{
    return [
        'foo' => [new DataURI()],
    ];
}
```

### `DivisibleBy`

The field under validation must be divisible by the given number.

    public Arifszn\AdvancedValidation\Rules\DivisibleBy::__construct(int $number, string $errorMessage = null)

```php
use Arifszn\AdvancedValidation\Rules\DivisibleBy;

public function rules()
{
    return [
        'foo' => [new DivisibleBy(2)],
    ];
}
```

### `EthereumAddress`
The field under validation must be an [Ethereum](https://ethereum.org/en/) address. Does not validate address checksums.

    public Arifszn\AdvancedValidation\Rules\EthereumAddress::__construct(string $errorMessage = null)

```php
use Arifszn\AdvancedValidation\Rules\EthereumAddress;

public function rules()
{
    return [
        'foo' => [new EthereumAddress()],
    ];
}
```

### `FloatNumber`

The field under validation must be a float number.

    public Arifszn\AdvancedValidation\Rules\FloatNumber::__construct(string $errorMessage = null)

```php
use Arifszn\AdvancedValidation\Rules\FloatNumber;

public function rules()
{
    return [
        'foo' => [new FloatNumber()],
    ];
}
```

### `Hash`

The field under validation must be a hash of type algorithm.

Algorithm is one of `'md4', 'md5', 'sha1', 'sha256', 'sha384', 'sha512', 'ripemd128', 'ripemd160', 'tiger128', 'tiger160', 'tiger192', 'crc32', 'crc32b'`.

    public Arifszn\AdvancedValidation\Rules\Hash::__construct(string $algorithm, string $errorMessage = null)

```php
use Arifszn\AdvancedValidation\Rules\Hash;

public function rules()
{
    return [
        'foo' => [new Hash('md4')],
    ];
}
```

### `ImageURL`

The field under validation must be a valid image URL.

    public Arifszn\AdvancedValidation\Rules\ImageURL::__construct(string $errorMessage = null)

✓ https://www.php.net/images/logos/php-logo.png \
✕ https://imaginarysite123.com/invalid.png

```php
use Arifszn\AdvancedValidation\Rules\ImageURL;

public function rules()
{
    return [
        'avatar' => [new ImageURL()],
    ];
}
```

### `Name`

The field under validation must be a valid name.

- no emoji
- no number (if $allowNumber flag is true, it will accept numbers, default is false)
- special characters are allowed

    public Arifszn\AdvancedValidation\Rules\Name::__construct(bool $allowNumber = false, string $errorMessage = null)

```php
use Arifszn\AdvancedValidation\Rules\Name;

public function rules()
{
    return [
        'name' => [new Name()],
    ];
}
```

### `Phone`

The field under validation must be a valid phone number.

✓ +x-xxx-xxx-xxxx \
✓ +xxxxxxxxxxx \
✓ (xxx) xxx-xxxx \
✓ xxxxxxxxxx

    public Arifszn\AdvancedValidation\Rules\Phone::__construct(string $errorMessage = null)

```php
use Arifszn\AdvancedValidation\Rules\Phone;

public function rules()
{
    return [
        'foo' => [new Phone()],
    ];
}
```

### `Username`

The field under validation must be a valid username.

- starts with a letter (alpha)
- only alpha-numeric (a-z, A-Z, 0-9), underscore, minus and dot
- multiple underscores, minus and are not allowed (-- or __ or ..)
- underscores, minus and dot are not allowed at the beginning or end

    public Arifszn\AdvancedValidation\Rules\Username::__construct(string $errorMessage = null)

```php
use Arifszn\AdvancedValidation\Rules\Username;

public function rules()
{
    return [
        'username' => [new Username()],
    ];
}
```

### `WithoutSpaces`

The field under validation must not contain spaces.

    public Arifszn\AdvancedValidation\Rules\WithoutSpaces::__construct(string $errorMessage = null)

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

If you want to use the rules as strings and use them globally e.g. `'foo' => ['phone']`, you can do so by adding them to the boot method of your project's **AppServiceProvider**.

```php
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Arifszn\AdvancedValidation\Rules\Phone;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Validator::extend(
            'phone',
            'Arifszn\AdvancedValidation\Rules\Phone@passes',
            (new Phone())->message()
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


## Credits

- [validator.js](https://github.com/validatorjs/validator.js)


## Support

If you are using this package and happy with it or just want to encourage me to continue creating stuff, you can do it by just starring and sharing the project.


## License

This package is licensed under the [MIT License](https://github.com/arifszn/laravel-advanced-validation/blob/main/LICENSE).
