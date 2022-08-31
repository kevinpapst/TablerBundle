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

`item()` parameter requires either the `image` or `customContent` parameter:

|   Parameter   | Description                                    |     Type     | Default |
|:-------------:|------------------------------------------------|:------------:|:-------:|
|     image     | Path to an image                               |   `string`   |         |
| customContent | Custom html content. overrides `image` if set. | `html (raw)` | `null`  |
|     title     | Item title.                                    |   `string`   | `null`  |
|  description  | Item description.                              |   `string`   | `null`  |

#### Options

|       Parameter       | Description                                                              |   Type    |       Default       |
|:---------------------:|--------------------------------------------------------------------------|:---------:|:-------------------:|
|          id           | Custom `id` to apply to the carousel                                     |  `mixed`  |   `rand(Number)`    |
|      extraClass       | Add extra classes on steps container                                     | `string`  |   _empty string_    |
|       interval        | Interval in milliseconds to change the slides                            |   `int`   |        5000         |
|         touch         | Support touch input (see Bootstrap docs)                                 | `boolean` |       `true`        |
|         pause         | Auto stop sliding (see Bootstrap docs)                                   |  `mixed`  |       `false`       |
|         wrap          | Restart again (see Bootstrap docs)                                       | `boolean` |       `true`        |
|       controls        | Show controls                                                            | `boolean` |       `false`       |
|  captionCustomClass   | Apply custom class to caption                                            | `string`  | `d-none d-md-block` |
|   captionBackground   | Show caption background                                                  | `boolean` |       `true`        |
|      indicators       | Show indicators                                                          | `boolean` |       `true`        |
|    indicatorsType     | Set indicators type (allowed values: `dots`, `thumbs`)                   | `string`  |   _empty string_    |
|    indicatorsRatio    | Set indicators ratio (see Tabler docs)                                   | `string`  |   _empty string_    |
| indicatorsOrientation | Set indicators orientation (see Tabler docs, allowed values: `vertical`) | `string`  |   _empty string_    |

Links:

- [Tabler docs](https://preview.tabler.io/docs/carousel.html) 
- [Bootstrap docs](https://getbootstrap.com/docs/5.2/components/carousel/#options) 

### Usage

```twig
{% from '@Tabler/components/carousel.html.twig' import carousel %}

{% set items = [
    {
        'image': 'https://via.placeholder.com/640x360/1485bc/ffffff?text=Image+0',
    },
    {
        'customContent': '<h1>Hello World</h1>',
    },
    {
        'image': 'https://via.placeholder.com/640x360/9dbf00/ffffff?text=Image+1',
        'title': 'SOME Fancy Title',
        'description': 'Lorem Ipsum NO HTML',
    },
    {
        'image': 'https://via.placeholder.com/640x360/bc147a/ffffff?text=Image+2',
    },
    {
        'image': 'https://via.placeholder.com/640x360/1454bc/ffffff?text=Image+3',
    }
] %}

{% set options = {
    'interval': false,
    'controls': true,
    'indicators': true,
    'indicatorsType': 'thumbs',
    'indicatorsOrientation': 'vertical',
} %}

{ { carousel(items, options) } }
```

## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
