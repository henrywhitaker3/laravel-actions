# Laravel Actions

![GitHub Workflow Status (branch)](https://img.shields.io/github/workflow/status/henrywhitaker3/laravel-actions/PHP%20Composer/master?label=tests&logoColor=%234c1&style=flat-square)
[![StyleCI](https://github.styleci.io/repos/335909164/shield?branch=master)](https://github.styleci.io/repos/335909164)

A simple Laravel actions package.

## Installation

```bash
composer require henrywhitaker3/laravelactions
```

## Usage

To create a new action, run:

```bash
php artisan make:action <name>
```

This will create a new action in `App/Actions`. You can then use the action in one of two ways:

```php
$action = new SomeAction();
$action->run();
```

Or you can use the `run` helper function:

```php
run(SomeAction::class);
```

You can pass arguments for the action's run method as the second argument in the helper function:

```php
run(SomeAction::class, $arg);
run(SomeAction::class, [$arg1, $arg2]);
```

## License

MIT license. Please see the [license file](license.md) for more information.