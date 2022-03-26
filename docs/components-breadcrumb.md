# Components

This theme ships some components (as twig macros) that hide the complexity of rendering the same elements over and over again with the correct HTML.

See Tabler documentation at https://preview.tabler.io/docs/breadcrumb.html

## Breadcrumb

```
{% from '@Tabler/components/breadcrumb.html.twig' import breadcrumb %}

{% set breadcrumb_items = {
    'Home':         path('homepage'),
    'Submenu':      path('submenu'),
    'Active page':  '#'
} %}

{{ breadcrumb(breadcrumb_items, 'arrows') }}
{{ breadcrumb(breadcrumb_items, 'bullets') }}
{{ breadcrumb(breadcrumb_items, 'alternate') }}
{{ breadcrumb(breadcrumb_items, 'dots') }}
```

## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
