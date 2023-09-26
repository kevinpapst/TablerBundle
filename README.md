# Tabler Bundle for Symfony

This repository contains a Symfony bundle, integrating the fantastic [Tabler.io](https://tabler.io) HTML Template into your Symfony project.
It ships with many twig helper (functions, filter, embeds, macros and includes) to speed up your development and simplify future upgrades!

It requires of Symfony >= 6.0 and PHP >= 8.1 :rocket: Read the [documentation](docs/index.md) to find out more :+1:

## Preview

Tabler is fully responsive and compatible with all modern browsers. Thanks to its modern, user-friendly design you can create a fully functional interface that users will love! 
Choose the layouts and components you need and customize them to make your design consistent and eye-catching. 
Every component has been created with attention to detail to make your interface beautiful! 
[Show me the demo](https://preview.tabler.io).

<a href="https://preview.tabler.io" target="_blank"><img src="https://raw.githubusercontent.com/tabler/tabler/dev/src/static/tabler-preview.png" alt="Tabler preview"></a>

## Features

- Two main layouts for your backend/admin application: a vertical and horizontal one
- Security layouts for login, forgot password, register account
- Many includes, embeds and macros to help speed up the development 

### Demo application

There is even a demo application, that showcases most of the components and can serve as a starting point for new projects :smile:

You can check it out here at Github in the [TablerBundle-Demo](https://github.com/kevinpapst/TablerBundle-Demo) repository.
  
### Technical details

- Webpack-Encore support for building assets
- Event-driven handling of menu entries, tasks and notifications
- ContextHelper for dynamic layout changes (e.g. based on user preferences)
- Translations for: english, german, italian, czech, spanish, russian, arabic, finnish, japanese, swedish, portuguese (brazilian), dutch, french, turkish, danish, chinese, slovakian, basque, polish, esperanto, hebrew, romanian ([please help translating it to more languages](https://hosted.weblate.org/projects/kimai/theme/))
- Based on Bootstrap 5
- Supports FontAwesome 5

## Installation

### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
composer require kevinpapst/tabler-bundle
```

### Step 2: Configure the Bundle

Copy the default config to your `config/packages/` directory:

```bash
cp vendor/kevinpapst/tabler-bundle/config/packages/tabler.yaml config/packages/
```

### Step 3: Enable the Bundle

Enable the bundle by adding it to the list of registered bundles
in the `config/bundles.php` file of your project:

```php
// config/bundles.php

return [
    // ...
    KevinPapst\TablerBundle\TablerBundle::class => ['all' => true],
];
```

### Step 4: Documentation

Now read what you should do in order to use the theme at [docs/](docs/index.md).

## License and contributors

Published under the MIT, read the [LICENSE](LICENSE) file for more information.

Translations managed with the fantastic [Weblate project](https://hosted.weblate.org/projects/kimai/theme/).

