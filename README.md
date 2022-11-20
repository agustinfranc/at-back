<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Instalation

-   composer install
-   php -r "file_exists('.env') || copy('.env.example', '.env');"
-   ./vendor/bin/sail artisan key:generate
-   chmod -R 777 storage bootstrap/cache

## Run

-   ./vendor/bin/sail up

## Useful commands

-   Shortcut to generate a model, migration, factory, seeder, policy, controller, and form requests...
    ./vendor/bin/sail artisan make:model Flight --all
-   Run migrations: ./vendor/bin/sail artisan migrate
-   Fresh migrate and run seeders: ./vendor/bin/sail artisan migrate:fresh --seed
-   Run tests: ./vendor/bin/sail test
-   Verify files: ./vendor/bin/phpcs
-   Fix files: ./vendor/bin/phpcbf

## Useful Links

-   https://fakerphp.github.io/
-   https://laravel.com/docs/9.x/eloquent-resources#conditional-attributes include attribute if user is admin
-   https://pestphp.com/docs/expectations
-   https://phpunit.readthedocs.io/en/9.5/
