# Migration from the AdminThemeBundle

This is not a step-by-step migration guide, but a collection of hints what needs to be done. 
Many of you will have a highly adjusted version of the AdminThemeBundle, so the best tip is to search 
for `adminlte` and check what needs to be done there.

## New requirements

- PHP >= 8
- Symfony >= 5.0
- Bootstrap 5

## Replace composer package

First you want to start-off with changing the composer package:

```
composer require kevinpapst/adminlte-bundle
composer require kevinpapst/tabler-bundle
``` 

The bundle in your `config/bundles.php` should be auto-replaced, it changes from:
```
<?php
return [
    ...
    KevinPapst\AdminLTEBundle\AdminLTEBundle::class => ['all' => true],
];
```
to
```
<?php
return [
    ...
    KevinPapst\TablerBundle\TablerBundle::class => ['all' => true],
];
```

## Changed bundle name

Due to the changes in the bundle, you have to replace all class and view references.

### Namespaces

Replace `use KevinPapst\AdminLTEBundle\` with `use KevinPapst\TablerBundle\`.

### Template references

Replace `@AdminLTE/` with `@Tabler`, as example before
```
{% include('@AdminLTE/layout.html.twig') %}
```
and afterwards
```
{% include('@Tabler/layout.html.twig') %}
```
## File changes

A lot of files were renamed/moved to a new directory:

- TODO explain changes

## Changed configuration

The configuration is now in the file `tabler.yaml` with the main key `tabler`, which was previously `admin_lte` in the file `admin_lte.yaml`.

- TODO explain changes

## Changed route aliases

- TODO explain changes

## Removed components

- TODO explain changes

## Template changes

- Card embed
  - Removed automatic ID, which was also moved from body to the outer element ([#25](https://github.com/kevinpapst/TablerBundle/pull/25))
  - Footer collapses by default now ([#25](https://github.com/kevinpapst/TablerBundle/pull/25))  

## Next steps

Please go back to the [Tabler bundle documentation](README.md) to find out more about using the theme.
