# Codeigniter HMVC Starter Kit

[![Codeigniter](https://img.shields.io/badge/Codeigniter-v3.1.11-orange.svg)](http://codeigniter.com/)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/fb7b15d17a3342c2a5ebd6228272c234)](https://www.codacy.com/manual/yoga-dev/Codeigniter-Starter-Kit)
[![StyleCI](https://github.styleci.io/repos/213558653/shield?branch=master)](https://github.styleci.io/repos/213558653)

## Prerequisities
* PHP 5.5.6+
* PDO extension.
* Composer or composer.phar.

This repository contains following features

## Features
* Dotenv.
* Eloquent ORM.
* Whoops.
* VarDumper.
* Swift Mailer.
* Classmap autoloading for loading custom classes.
* Common Symphony CLI commands for common tasks, such as development server, generating models, and controllers.

## Getting started
Clone the repo.
Install dependencies
```
composer install
```

1. Clone the ".env.example" and rename to any environment name (development, testing, production). "Eg: .env.development".
2. Edit the new env file based on your need.
3. Set the environment in .htaccess file.

you are ready to GO!

## Command Basics
### Development Server:
To start the development server, run following command.
```
php app serve
```
You may also change the default host and port as
```
php app serve <host> <port>
```

### Generating Models
To generate a model, run following command.
```
php app make:model <model_name> <parent_name> --table="<table_name>"
```
`<parent_name>` & `<table_name>` are optional one. Its is recommended to use model name in singular form.

You may defined sub-directories by adding '/' between directories. Please note that the models will be autoloaded using composer classmap autoloading, so you will need to run 'composer dump-autoload' if creating models manually.

By default all the models will be extended to Eloquent ORM base class, if you wish to use CI query builder, extend model to 'CI_Model' instead of Eloquent in 'MY_Model' class in core directory.

### Generating Controllers
To generate a controller, run following command.
```
php app make:controller <controller_name> <core_class>
```
Here core class can be 'MY_Controller'. `<core_class>` is optional one.

### Models
Eloquent ORM has been integrated, to use it effective you will be required to create seperate models for each database table. To use a model, load it using following snippet
```
$this->load->model(<Model>)
```
Once loaded you can access the table as per eloquent syntax, for example:
```
Model::get(id)
```
To learn more about using eloquent, refer the Laravel's Eloquent [user guide](https://laravel.com/docs/5.6/eloquent)
