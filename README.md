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

* PHP 7.2.5 or newer

## Seed data

```bash
artisan migrate:fresh --seed
```

## Development with Docker

### Information

To access the container use the following command:

```
docker-compose exec tooling bash
```

Run artisan commands in the application container and other commands like composer or npm in the tooling container.

To expose a port to your host add an docker-compose.override.yml like this one:

```yml
version: '3.7'

networks:
    web:
        external: false

    services:
        application:
            ports:
                - 8080:8080
```

Run 

```bash
docker-compose -f docker-compose.yml -f docker-compose.override.yml up -d
```
to execute both files.

### Setup

* Create `.env`-file like .env.example
* Startup container with `docker-compose up -d`
* Go into the container with `docker-compose exec application bash`
* Generate APP_KEY with `php artisan key:generate`

### Use with proxy

When you use this with a proxy, you don't need the `docker-compose.override.yml`.

### Use with Linux

To develop with docker under linux you have to add your user and group id to your `.env`-file.

To access the container user the following command:

```bash
docker-compose exec --user www-data application bash
```

## License Information

Laravel Livewire is open-sourced software licensed under the [MIT license](LICENSE.md).
laravel/framework is licensed under the [MIT license](LICENSE.md).
This package is also licensed under the [MIT license](LICENSE.md).
