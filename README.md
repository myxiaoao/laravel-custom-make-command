# Laravel Custom Make Command

custom laravel make commands for dev.

## Requirements

- PHP 8.0 or higher
- Laravel 9.0 or higher

## Installation

```bash
composer require cooper/laravel-custom-make-command --dev
```

## Usage

> **Note**  
> Support for sub-folders. 

* make:service

```bash
php artisan make:service demo 

// Service [app/Services/DemoService.php] created successfully.
```

* make:repository

```bash
php artisan make:repository demo

// Repository [app/Repositories/DemoRepository.php] created successfully.
```

## License

Laravel Custom Make Command is open-sourced software licensed under [the MIT license](LICENSE.md).