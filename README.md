# Keep a password history of your users to prevent them from reusing the same password like Facebook, Google

[![Latest Version on Packagist](https://img.shields.io/packagist/v/vanthao03596/laravel-password-history.svg?style=flat-square)](https://packagist.org/packages/vanthao03596/laravel-password-history)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/vanthao03596/laravel-password-history/run-tests?label=tests)](https://github.com/vanthao03596/laravel-password-history/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/vanthao03596/laravel-password-history/Check%20&%20fix%20styling?label=code%20style)](https://github.com/vanthao03596/laravel-password-history/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/vanthao03596/laravel-password-history.svg?style=flat-square)](https://packagist.org/packages/vanthao03596/laravel-password-history)


Keep a password history of your users to prevent them from reusing the same password, for security reasons like what google does.


## Installation

You can install the package via composer:

```bash
composer require vanthao03596/laravel-password-history
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Vanthao03596\LaravelPasswordHistory\LaravelPasswordHistoryServiceProvider" --tag="password-history-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Vanthao03596\LaravelPasswordHistory\LaravelPasswordHistoryServiceProvider" --tag="password-history-config"
```

This is the contents of the published config file:

```php
return [
    /**
     * The table name to save your password histories.
     */
    'table_name' => 'password_histories',

    /*
     * The fully qualified class name of the password_histories model.
     */
    'password_history_model' => \Vanthao03596\LaravelPasswordHistory\Models\PasswordHistory::class,

    /*
     * The number of months you want to check against new password.
     */

     'months_to_check' => 12,
];
```

## Usage

To make an Eloquent model store password histories just add the `\Vanthao03596\LaravelPasswordHistory\HasPasswordHistory` trait to it:

```php
use Illuminate\Database\Eloquent\Model;
use Vanthao03596\LaravelPasswordHistory\HasPasswordHistory;

class YourModel extends Model
{
    use HasPasswordHistory;
    
    ...
}
```

## Validation Rules

And there is a validation rule for you to check the entire password history agaist the new password in laravel validation rules.

```php
use Vanthao03596\LaravelPasswordHistory\Rules\NotInPasswordHistory;
//...

$rules = [
    // ... 
    'password' => [
       'required',
       'confirmed',
       new NotInPasswordHistory(request()->user()),
    ]
    // ... 
];

$this->validate(...);
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

- [phamthao](https://github.com/phamthao)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
