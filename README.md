# Essentials

<p>
    <a href="https://github.com/fleet-tower/essentials/actions/workflows/tests.yml"><img src="https://img.shields.io/github/actions/workflow/status/fleet-tower/essentials/tests.yml?style=for-the-badge&logo=github&label=tests" alt="Build Status"></a>
    <a href="https://packagist.org/packages/fleet-tower/essentials"><img src="https://img.shields.io/packagist/dt/fleet-tower/essentials?style=for-the-badge" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/fleet-tower/essentials"><img src="https://img.shields.io/packagist/v/fleet-tower/essentials?style=for-the-badge&logo=Packagist" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/fleet-tower/essentials"><img src="https://img.shields.io/packagist/l/fleet-tower/essentials?style=for-the-badge&color=blue" alt="License"></a>
</p>

Essentials provide **better defaults** for your Laravel applications, including strict models, automatically eagerly loaded relationships, immutable dates, and more! 

### Notice

This package is a **modified clone** of the original work by **[Nuno Maduro](https://github.com/nunomaduro/essentials)** and their contributors.  
All credit and recognition belong to the original creator(s).

The purpose of this fork is to:
- Remove unused functionalities that are not required in our environment.
- Ensure the package remains available and versioned within our company repository for long-term stability and security, regardless of potential future changes or removal from the original source.
- Apply a namespace change strictly to reflect the internal usage and maintenance of this version, without implying ownership of the original work.

This repository is **not an official distribution** of the original package. We encourage developers to use and support the **official package** whenever possible.

> **Requires [PHP 8.4+](https://php.net/releases)**, **[Laravel 12+](https://laravel.com/docs/12.x)**.

> **Note:** This package modifies the default behavior of Laravel. **It is recommended to use it in new projects** or when you are comfortable with the changes it introduces.

## Installation

⚡️ Get started by requiring the package using [Composer](https://getcomposer.org):

```bash
composer require fleet-tower/essentials
```

## Features

All features are optional and configurable in `config/essentials.php`.

You may publish the configuration file with:

```bash
php artisan vendor:publish --tag=essentials-config
```

## Table of Contents
- [Strict Models](#-strict-models)
- [Auto Eager Loading](#-auto-eager-loading)
- [Optional Unguarded Models](#-optional-unguarded-models)
- [Immutable Dates](#-immutable-dates)
- [Force HTTPS](#-force-https)
- [Safe Console](#-safe-console)
- [Asset Prefetching](#-asset-prefetching)
- [Prevent Stray Requests](#-prevent-stray-requests)
- [Fake Sleep](#-fake-sleep)
- [Artisan Commands](#-artisan-commands)
  - [make:action](#makeaction)

### ✅ Strict Models

Improves how Eloquent handles undefined attributes, lazy loading, and invalid assignments.

- Accessing a missing attribute throws an error.
- Lazy loading is blocked unless explicitly allowed.
- Setting undefined attributes throws instead of failing silently.

**Why:** Avoids subtle bugs and makes model behavior easier to reason about.

---

### ⚡️ Auto Eager Loading

Automatically eager loads relationships defined in the model's `$with` property.

**Why:** Reduces N+1 query issues and improves performance without needing `with()` everywhere.

---

### 🔓 Optional Unguarded Models

Disables Laravel's mass assignment protection globally (opt-in).

**Why:** Useful in trusted or local environments where you want to skip defining `$fillable`.

---

### 🕒 Immutable Dates

Uses `CarbonImmutable` instead of mutable date objects across your app.

**Why:** Prevents unexpected date mutations and improves predictability.

---

### 🔒 Force HTTPS

Forces all generated URLs to use `https://`.

**Why:** Ensures all traffic uses secure connections by default.

---

### 🛑 Safe Console

Blocks potentially destructive Artisan commands in production (e.g., `migrate:fresh`).

**Why:** Prevents accidental data loss and adds a safety net in sensitive environments.

---

### 🚀 Asset Prefetching

Configures Laravel Vite to preload assets more aggressively.

**Why:** Improves front-end load times and user experience.

---

### 🔄 Prevent Stray Requests

Configures Laravel Http Facade to prevent stray requests.

**Why:** Ensure every HTTP calls during tests have been explicitly faked.

---

### 😴 Fake Sleep

Configures Laravel Sleep Facade to be faked.

**Why:** Avoid unexpected sleep during testing cases.

### 🏗️ Artisan Commands

#### `make:action`

Quickly generates action classes in your Laravel application:

```bash
php artisan make:action CreateUserAction
```

This creates a clean action class at `app/Actions/CreateUserAction.php`:

```php
<?php

declare(strict_types=1);

namespace App\Actions;

final readonly class CreateUserAction
{
    /**
     * Execute the action.
     */
    public function handle(): void
    {
        DB::transaction(function (): void {
            //
        });
    }
}
```

Actions help organize business logic in dedicated classes, promoting single responsibility and cleaner controllers.

## Configuration

All features are configurable through the `essentials.php` config file. By default, most features are enabled, but you can disable any feature by setting its configuration value to `false`:

```php
// config/essentials.php
return [
    FleetTower\Essentials\Configurables\ShouldBeStrict::class => true,
    FleetTower\Essentials\Configurables\Unguard::class => false,
    // other configurables...
];
```

You may also publish the stubs used by this package:

```bash
php artisan vendor:publish --tag=essentials-stubs
```

## Roadmap

- Better defaults before each test case
- Better Pint configuration by default
- General cleanup of the skeleton
- Additional configurables for common Laravel patterns

## License

**Essentials** was created by **[Nuno Maduro](https://twitter.com/enunomaduro)** under the **[MIT license](https://opensource.org/licenses/MIT)**.
