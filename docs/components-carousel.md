# Components

This theme ships some components (as twig macros) that hide the complexity of rendering the same elements over and over again with the correct HTML.

See Tabler documentation at https://preview.tabler.io/carousel.html

## Breadcrumb

```twig
{% from '@Tabler/components/carousel.html.twig' import carousel %}

{% set items =
    {
        'key0':
        {
            'image': 'https://via.placeholder.com/640x360/1485bc/ffffff?text=Image+0',
        },
        'keyContent':
        {
            'custom_content': '<h1>Hello World</h1>',
        },
        'key1':
        {
            'image': 'https://via.placeholder.com/640x360/9dbf00/ffffff?text=Image+1',
            'title': 'SOME Fancy Title',
            'description': 'Lorem Ipsum NO HTML',
        },
        'key2':
        {
            'image': 'https://via.placeholder.com/640x360/bc147a/ffffff?text=Image+2',
        },
        'key3':
        {
            'image': 'https://via.placeholder.com/640x360/1454bc/ffffff?text=Image+3',
        }
    }
    %}

{% set options =
    {
        'interval': false,
        'controls': true,
        'indicators': true,
        'indicators_type': 'thumbs',
        'indicators_orientation': 'vertical',
    }
    %}

{ { carousel(items, options) } }
```

## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
