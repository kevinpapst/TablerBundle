# Components

This theme ships some components (as twig macros) that hide the complexity of rendering the same elements over and over again with the correct HTML.

See Tabler documentation at https://preview.tabler.io/carousel.html

## Carousel

### Parameters
`carousel()` macro, waits for 2 parameters:

| Parameter | Description                |   Type    | Default |
|:---------:|:---------------------------|:---------:|:-------:|
|   items   | Array of [Item](#Step)     |  `array`  |  `[]`   |
|  options  | [Options](#Options) object | `object`  |  `{}`   |

#### Item
|  Parameter  | Description                                |   Type    |      Default      |
|:-----------:|--------------------------------------------|:---------:|:-----------------:|
| image | Path to an image | `string` | |
| custom_content | Custom html content. overrides `image` if set. | `html (raw)` | `null` |
| title | Item title. | `string` | `null` |
| description | Item description. | `string` | `null` |

#### Options
| Parameter  | Description                                          |   Type    |    Default     |
|:----------:|------------------------------------------------------|:---------:|:--------------:|
|  id   | Custom `id` to apply to the carousel | `mixed` |    `rand(Number)`     |                                           
| extraClass | Add extra classes on steps container                 | `string`  | _empty string_ |
| interval | Interval to change the slides | `int`  | 5000 |  
| touch | Support touch input. See: https://getbootstrap.com/docs/5.2/components/carousel/#options | `boolean`  | `true` |
| pause | Auto stop sliding. See: https://getbootstrap.com/docs/5.2/components/carousel/#options | `mixed` | `false` |
| wrap | Restart again. See: https://getbootstrap.com/docs/5.2/components/carousel/#options | `boolean` | `true` |
| controls | Show controls | `boolean` | `false` |
| caption_custom_class | Apply custom class to caption | `string` | `d-none d-md-block` |
| caption_background | Show caption background | `boolean` | `true` |
| indicators | Show indicators | `boolean` | `true` |
| indicators_type | Set indicators type: `dots`, `thumbs` | `string` | _empty string_ |
| indicators_ratio | Set indicators ratio. See docs tabler | `string` | _empty string_ |
| indicators_orientation | Set indicators orientation. See docs tabler | `string` | `horizontal` |

### Usage

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
