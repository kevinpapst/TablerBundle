# Migration from the AdminThemeBundle

This is not a step-by-step migration guide, but a collection of hints what needs to be done. 
Many of you will have a highly adjusted version of the AdminThemeBundle, so the best tip is to search 
for `adminlte` and check what needs to be done there.

## New requirements

- PHP >= 8
- Symfony >= 5.0
- Twig >= 3.0
- Bootstrap 5

## Replace composer package

First you want to start-off with changing the composer package:

```bash
rm config/packages/admint_lte.yaml
composer remove kevinpapst/adminlte-bundle
composer require kevinpapst/tabler-bundle
cp vendor/kevinpapst/tabler-bundle/config/packages/tabler.yaml config/packages/
bin/console assets:install
```

Search and replace
```
{% extends '@AdminLTE/layout/default-layout.html.twig' %}
```
with
```
{% extends '@Tabler/layout-horizontal.html.twig' %}
```

Search and replace:
```yaml
framework:
    assets:
        json_manifest_path: '%kernel.project_dir%/public/bundles/adminlte/manifest.json'
```
with
```yaml
framework:
    assets:
        json_manifest_path: '%kernel.project_dir%/public/bundles/tabler/manifest.json'
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

Refresh your cache and fix errors ;-)
```bash
bin/console cache:clear
bin/console cache:warmup
```

## Changed bundle name

Due to the changes in the bundle, you have to replace all class and view references.

### Namespaces

Replace `use KevinPapst\AdminLTEBundle\` with `use KevinPapst\TablerBundle\`.

### Template references

Replace `@AdminLTE/` with `@Tabler`.

Replace
```
{% extends '@AdminLTE/layout/default-layout.html.twig' %}
```
with
```
{% extends '@Tabler/layout-horizontal.html.twig' %}
```

The file:
```
{% import "@AdminLTE/Macros/default.html.twig" as macro %}
```
was split into many small components, eg.
```
{% import '@Tabler/components/flash.html.twig' as flash_macro %}
```

Replace
```
{% form_theme form '@AdminLTE/layout/form-theme-horizontal.html.twig' %}
```
with
```
{% form_theme form '@Tabler/layout/form-theme-horizontal.html.twig' %}
```

Replace
```
{% embed '@AdminLTE/Widgets/box-widget.html.twig' %}
```
with
```
{% embed '@Tabler/embeds/card.html.twig' %}
```

Replace
```
{% import '@AdminLTE/Macros/buttons.html.twig' as button %}
```
with
```
{% import '@Tabler/components/buttons.html.twig' as button %}
```

## PHP changes

A lot of files were renamed/moved to a new directory:

- Class `SidebarMenuEvent` renamed to `MenuEvent`
- Class `BreadcrumbMenuEvent` removed
- Class `NavbarUserEvent` replaced with `UserDetailsEvent`
- Class `SidebarUserEvent` removed
- Class `NotificationListEvent` replaced with `NotificationEvent`
- Multiple classes remove their fluent interface (eg. `MenuEvent`)

## Changed configuration

The configuration is now in the file `tabler.yaml` with the main key `tabler`, which was previously `admin_lte` in the file `admin_lte.yaml`.

- TODO explain changes

## Changed route aliases

- TODO explain changes

## Removed components

- No more support for FOSUserBundle
- TODO explain changes

## Template changes

- Card embed
  - Removed automatic ID, which was also moved from body to the outer element ([#25](https://github.com/kevinpapst/TablerBundle/pull/25))
  - Footer collapses by default now ([#25](https://github.com/kevinpapst/TablerBundle/pull/25))  

## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
