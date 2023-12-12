# Components

This theme ships some components (as twig macros) that hide the complexity of rendering the same elements over and over again with the correct HTML.

See Tabler documentation at https://preview.tabler.io/accordion.html

## Accordion

### Parameters
`accordion()` macro, waits for 2 parameters:

| Parameter | Description                |   Type   | Default |
|:---------:|:---------------------------|:--------:|:-------:|
|   items   | Array of [Item](#Item)     | `array`  |  `[]`   |
|  options  | [Options](#Options) object | `object` |  `{}`   |

#### Item
| Parameter | Description                                          |   Type   |    Default     |
|:---------:|------------------------------------------------------|:--------:|:--------------:|
|   title   | Title of the item                                    | `string` | _empty string_ |
|   body    | Content of the item, can be `HTML` with `raw` option | `string` | _empty string_ |
|  options  | Customize the [Item Options](#Item-Options)          | `object` |      `{}`      |

##### Item Options
|    Parameter    | Description                      |   Type    |    Default     |
|:---------------:|----------------------------------|:---------:|:--------------:|
|      open       | Item should be opened by default | `boolean` |    `false`     |
| titleExtraClass | Add extra class to the title     | `string`  | _empty string_ |
| bodyExtraClass  | Add extra class to the body      | `string`  | _empty string_ |

#### Options
| Parameter  | Description                                                                                                                  |   Type    |             Default              |
|:----------:|------------------------------------------------------------------------------------------------------------------------------|:---------:|:--------------------------------:|
|     id     | Set custom `id` to accordion                                                                                                 | `string`  | `tabler_unique_id('accordion_')` |                                        
|    raw     | Use raw output for `title` and `body`                                                                                        | `boolean` |              `true`              |                                        
|   flush    | Remove certains styles (see [Boostrap docs](https://getbootstrap.com/docs/5.0/components/accordion/#flush))                  | `boolean` |             `false`              | 
| alwaysOpen | Holds the accordion elements open (see [Bootstrap Doc](https://getbootstrap.com/docs/5.0/components/accordion/#always-open)) | `boolean` |             `false`              |   
| extraClass | Add extra classes on accordion container                                                                                     | `string`  |          _empty string_          |      

### Usage

```twig
{% from '@Tabler/components/accordion.html.twig' import accordion %}

{% set items = [
    {
      'title': 'Title 1',
      'body': 'Body 1',
    },
    {
      'title': 'Title 2',
      'body': 'Body 2',
      'options':
      {
        'open' : true,
        'titleExtraClass': 'bg-success text-white',
        'bodyExtraClass': 'bg-danger pt-3',
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
    'raw': true,
    'alwaysOpen': false,
    'extraClass': 'mb-0',
} %}

{{ accordion(items, options) }}
```

## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
