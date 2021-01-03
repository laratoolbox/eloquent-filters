# Laravel Eloquent Filters

Create and use eloquent filters easily.

# Installation

You can install the package via composer:

```bash
$ composer require laratoolbox/database-viewer
```

# Usage

First create filter like below.

```shell
php artisan make:filter UserFilter
```

After creating the filter, add Filter trait into your eloquent model.

```php
use \LaraToolbox\EloquentFilters\Traits\Filters;
```

Then you may use filter like below.

```php
MyEloquentModel::filter( new UserFilter(request()) )->get();
```

# Testing

// TODO:

# Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

# Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

# Security

If you discover any security related issues, please email hasansemiherdogan@gmail.com instead of using the issue tracker.

 Credits

- [Semih ERDOGAN](https://github.com/laratoolbox)
- [Dincer DEMIRCIOGLU](https://github.com/dinncer)
- [All contributors](https://github.com/laratoolbox/database-viewer/graphs/contributors)

# License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
