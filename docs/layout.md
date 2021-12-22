# Using the layout

In order to use the layout, your views should extend from the provided `layout`
```twig
{% extends '@Tabler/layout.html.twig' %}
```

## Layout files

This bundle ships with two main template files which you can extend in your theme.

**For all your admin pages**

The default `layout.html.twig` can be used with:   
```
{% extends '@Tabler/layout.html.twig' %}
```

**For your security screens**

The `security.html.twig` for login, register ... can be used with:   
```
{% extends '@Tabler/security.html.twig' %}
```

## Twig Context-Helper

Instead of fully relying on blocks and includes, you are provided with a twig global named `tabler_bundle`.

To see all available settings, simply dump it in one of your templates:

```twig
{{ dump(tabler_bundle) }}
```

You can use it to retrieve theme related settings, but you can also use it as parameter bag
to carry values from your backend to any place in your template with the method:

- `setOption(string $name, $value): void`
- `hasOption(string $name): bool`
- `getOption(string $name, $default = null): mixed`
- `getOptions(): array` - will return yours and also all Tabler bundler related settings


## Partials

In order to make it easier to overwrite template regions, there are several partials included.
Those can be overwritten individually as described [here](http://symfony.com/doc/current/templating/overriding.html). 

Listed in the order of appearance, these are:

- `@Tabler/includes/menu.html.twig`
- `@Tabler/includes/footer.html.twig`
- `@Tabler/includes/navbar_notifications.html.twig`
- `@Tabler/includes/navbar_user.html.twig`

## Layout blocks

The blocks are defined in the layout in order of appearance. 
Some of them contain major components like the navigation, or the entire content area. 

TODO explain blocks

## Next steps

Please go back to the [Tabler bundle documentation](README.md) to find out more about using the theme.
