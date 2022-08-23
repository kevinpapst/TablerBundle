# Components

This theme ships some components (as twig macros) that hide the complexity of rendering the same elements over and over again with the correct HTML.

See Tabler documentation at https://preview.tabler.io/accordion.html

## Accordion

```twig
{% from '@Tabler/components/accordion.html.twig' import accordion %}

{% set items =
    {
        'key1':
        {
          'title': 'Title 1',
          'body': 'Body 1',
        },
        'key2':
        {
          'title': 'Title 1',
          'body': 'Body 2',
          'options':
          {
            'title_extraClass': 'bg-success text-white',
            'body_extraClass': 'bg-danger pt-3',
          },
        },
        'key3':
        {
          'title': 'Title 3',
          'body': 'Body 3',
          'options':
          {
            'extraClass': 'bg-danger-lt'
          }
        },
        'key4':
        {
          'title': '<div>Title 4 <strong>with HTML</strong></div>',
          'body': '<div>Body 4 <strong>with HTML</strong></div',
        },
    } %}

{% set options = {
    'id': 'example-accordion',
    'raw': null,
    'always_open': false,
    'extraClass': 'mb-0',
} %}

{{ accordion(items, options) }}
```

## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
