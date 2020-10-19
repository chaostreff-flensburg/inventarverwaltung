# Inventarverwaltung

`Inventarverwaltung` is a simple inventory management tool to keep track of your items.

[![MIT Software License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](LICENSE.md)

## Features

* create item blueprints
* create item instances 
* add item instances to storage location
* mark item instances as consumables
* checkin/checkout item instances

## Table of Contents

* [Requirements](#requirements)
* [Seed data](#seed-data)
* [Development with Docker](#development-with-docker)
* [License information](#license-information)

## Requirements

* Laravel 7.0 or newer
* PHP 7.2.5 or newer
* Livewire 1.3 or newer

## Seed data

```
php artisan migrate:fresh --seed
```

## Development with Docker

### Information

To access the container use the following command:

```
docker-compose exec tooling bash
```

Run artisan commands in the application container and other commands like composer or npm in the tooling container.

To expose a port to your host add an docker-compose.override.yml like this one:
```
version: '3.3'

networks:
    web:
        external: true
    stack:
        external: false

    services:
        application:
            ports:
                - 8080:80
```

Run 
```
docker-compose -f docker-compose.yml -f docker-compose.override.yml up -d
```
to execute both files.

### Setup
* Create env file like .env.example
* Startup container with `docker-compose up`
* Go into the container with `docker-compose exec tooling bash`
* If you want to use sqlite, create file with `touch ./storage/app/laravel.sqlite`
* Type `composer install`
* Generate APP_KEY with `php artisan key:generate`
* Migrate database

### Use with proxy

When you use this with a proxy, you don't need the `docker-compose.override.yml`.

### Use with Linux
To Develop with docker under linux you have to Export your user-id and group-id by adding th following to your bashrc
```
export USER_ID=$(id -u)
```

```
export GROUP_ID=$(id -g)
```

To access the container user the following command:

```
docker-compose exec --user ctfluser tooling bash
```

## License Information

Laravel Livewire is open-sourced software licensed under the [MIT license](LICENSE.md).
laravel/framework is licensed under the [MIT license](LICENSE.md).
This package is also licensed under the [MIT license](LICENSE.md).
