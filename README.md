# Tabler Bundle for Symfony

This repository contains a Symfony bundle, integrating the fantastic [Tabler.io](https://tabler.io) HTML Template into your Symfony project.

It ships with many twig helper (functions, filter, embeds. macros and includes) to speed up your development and simplify future upgrades!

## Introduction

WORK IN PROGRESS 

### Minimum requirements

- Symfony >= 4.4
- PHP >= 7.3

## Features

- A main layout for your backend/admin application
- Security layouts for login, forgot password, register account
- Many includes, embeds and macros to help speed up the development 
  
Technical details:

- Webpack-Encore support for building assets
- Event-driven handling of menu entries, tasks and notifications
- ContextHelper for dynamic layout changes (e.g. based on user preferences)
- Translations for: english, german, italian, czech, spanish, russian, arabic, finnish, japanese, swedish, portuguese (brazilian), dutch, french, turkish, danish, chinese, slovakian, basque, polish, esperanto, hebrew, romanian (please help translating it to more languages)
- Based on Bootstrap 5
- Supports FontAwesome 5

## Installation

### Applications that use Symfony Flex

Open a command console, enter your project directory and execute:

```console
composer require kevinpapst/tabler-bundle
```

### Applications that don't use Symfony Flex

#### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
composer require kevinpapst/tabler-bundle
```

#### Step 2: Configure the Bundle

Copy the default config to your `config/packages/` directory:

```bash
cp vendor/kevinpapst/tabler-bundle/config/packages/tabler.yaml config/packages/
```

#### Step 3: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `config/bundles.php` file of your project:

```php
// config/bundles.php

return [
    // ...
    KevinPapst\TablerBundle\TablerBundle::class => ['all' => true],
];
```

## License and contributors

Published under the MIT, read the [LICENSE](LICENSE) file for more information.
