# Components

This theme ships some components (as twig macros) that hide the complexity of rendering the same elements over and over again with the correct HTML.

See Tabler documentation at https://preview.tabler.io/accordion.html

## Accordion

### Parameters
`accordion()` macro, waits for 2 parameters:

| Parameter | Description                |   Type    | Default |
|:---------:|:---------------------------|:---------:|:-------:|
|   items   | Array of [Item](#Step)     |  `array`  |  `[]`   |
|  options  | [Options](#Options) object | `object`  |  `{}`   |

#### Item
|  Parameter  | Description                                |   Type    |      Default      |
|:-----------:|--------------------------------------------|:---------:|:-----------------:|
|    title     | Url href for the step when clicked         | `string`  |        `#`        |
|    body    | Title of the step                          | `string`  |  _empty string_   |
| options | Customize the item  | `object`  |   `{}`   |
| options.title_extraClass |Add extra class to the title | `string`  |   _empty string_   |
| options.body_extraClass |Add extra class to the body  | `string`  |   _empty string_   |

#### Options
| Parameter  | Description                                          |   Type    |    Default     |
|:----------:|------------------------------------------------------|:---------:|:--------------:|
|  id   | Set custom `id` to accordion | `mixed` |    `rand(number)`     |                                        
|   raw    | Use raw output for `title` and `body`                             | `boolean`  |   `true`    |                                        
|  flush   | Remove padding. See tabler.                     | `boolean` |    `false`     | 
|    always_open    | Do not close previous items on click.          | `boolean`  |      `false`      |   
| extraClass | Add extra classes on accordion container                 | `string`  | _empty string_ |      

### Usage

```twig
{% from '@Tabler/components/accordion.html.twig' import accordion %}

{% set items = [
        {
          'title': 'Title 1',
          'body': 'Body 1',
        },
        {
          'title': 'Title 1',
          'body': 'Body 2',
          'options':
          {
            'title_extraClass': 'bg-success text-white',
            'body_extraClass': 'bg-danger pt-3',
          },
        },
        {
          'title': 'Title 3',
          'body': 'Body 3',
          'options':
          {
            'extraClass': 'bg-danger-lt'
          }
        },
        {
          'title': '<div>Title 4 <strong>with HTML</strong></div>',
          'body': '<div>Body 4 <strong>with HTML</strong></div',
        },
    ] %}

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
