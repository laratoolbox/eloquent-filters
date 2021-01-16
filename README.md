# Laravel Eloquent Filters

Create and use eloquent filters easily.

This package idea comes from [Laracasts lets build a forum with laravel](https://laracasts.com/series/lets-build-a-forum-with-laravel) series. 

# Installation

You can install the package via composer:

```bash
$ composer require laratoolbox/eloquent-filters
```

# Usage

First create filter like below.

```shell
php artisan make:filter UserFilter
```

After creating the filter, add EloquentFilter trait into your eloquent model.

```php
use \LaraToolbox\EloquentFilters\HasFilter;
```

Then you may use filter like below.

```php
MyEloquentModel::filter( new UserFilter() )->get();

// or you can give request instance into filter.

$request = request();
MyEloquentModel::filter( new UserFilter($request) )->get();
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
