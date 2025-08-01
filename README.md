# URL Shortener API

This is the backend of the URL Shortener project.

## Requirements

If you use docker, you don't need to install any of the following requirements, but if you want to run the application locally, you need to install the following:
- PHP 8.2
- Composer
- Node.js 22.x
- NPM

## Installation

URL Shortener backend is a Laravel API application; it's build on top of Laravel 12 and uses a PostgreSQL database. 

1. Clone the repository:
    ```sh
    git clone https://github.com/luizflm/url-shortener.git
    cd url-shortener
    ```

2. Install Composer Dependencies (using Docker)
    ```sh
    docker run --rm --interactive --tty \
        -v $(pwd):/app \
        composer install
    ```

2. Run Sail to start the development server:
    ```sh
    ./vendor/bin/sail up -d
    ```

3. Connect to the container:
    ```sh
    ./vendor/bin/sail shell
    ```

4. Install Node.js dependencies:
    ```sh
    npm install
    ```

6. Copy the example environment file and generate an application key:
    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

7. Create the PostgreSQL database and run migrations:
    ```sh
    php artisan migrate
    ```

## Packages

### For Prod

#### # [darkaonline/l5-swagger](https://github.com/DarkaOnLine/L5-Swagger)

L5 Swagger - OpenApi or Swagger Specification for Laravel project made easy.

### For dev:

#### # [Sail](https://laravel.com/docs/10.x/sail)

Laravel Sail is a light-weight command-line interface for interacting with Laravel's default Docker development
environment.

#### # [Pest](https://pestphp.com)

Pest is a testing framework with a focus on simplicity,
meticulously designed to bring back the joy of testing in PHP.

#### # [Larastan](https://github.com/nunomaduro/larastan)

Larastan focuses on finding errors in your code. It catches whole classes of bugs even before you write tests for the
code.

#### # [Laravel Pint](https://laravel.com/docs/10.x/pint)

Laravel Pint is an opinionated PHP code style fixer for minimalists.

## API Documentation

The API documentation is available at `/api/documentation` route.

## Testing

To run all tests, use the following command:

``` sh
    composer test
```