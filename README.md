# WIPO

## Installing the Project

First, clone the project.
`https://github.com/lowki93/TerraNova.git`

Now, you only have the project, with no dependencies.
Install composer and run

`composer install --dev`

## Checking your System Configuration

Before starting coding, make sure that your local system is properly
configured for Symfony.

Execute the `check.php` script from the command line:

    php app/check.php

## Setup permissions

Make the cache and logs directory writable for the apache user:

    sudo setfacl -R -m u:www-data:rwx -m u:my_username:rwx app/cache app/logs web/img/badge web/img/slide web/img/theme web/img/trophy

    sudo setfacl -dR -m u:www-data:rwx -m u:my_username:rwx app/cache app/logs web/img/badge web/img/slide web/img/theme web/img/trophy

You can find the value of `my_username` with `whoami`

## Setup the database

### Create the database and its user

Create database Wipo in MySql

### Create the schema

As the schema :

    app/console doctrine:migrations:migrate

## Create a Admin

Create a admin with this commande

    app/console fos:user:create admin --super-admin
    
enter an email and a password. You will see and error but it's normaly