# Badge Component

This theme ships some components (as twig macros) that hide the complexity of rendering consistent Tabler elements with the correct HTML and classes.

See badge documentation at https://preview.tabler.io/badges.html

## Badge

### Parameters

| Parameter | Description                |   Type   |   Default    |
|:---------:|:---------------------------|:--------:|:------------:|
|  options  | [Options](#Options) object | `object` |     `{}`     | 

### Options

|  Parameter   | Description                                                    |  Type   |    Default     |
|:------------:|:---------------------------------------------------------------|:-------:|:--------------:|
|   content    | Content of the badge                                           | string  | _empty string_ |
|    color     | Tabler color name (`blue`, `red`, `primary`, `green-lt`, etc.) | string  | _empty string_ |
|   outline    | Add the `badge-outline` class                                  | boolean |    `false`     |
|     pill     | Add the `badge-pill` class                                     | boolean |    `false`     |
|     dot      | Add the `badge-dot` class                                      | boolean |    `false`     |
| notification | Add the `badge-notification` class                             | boolean |    `false`     |
|    blink     | Add the `badge-blink` animation class                          | boolean |    `false`     |
|     size     | Badge size (`sm`, `lg`, etc.)                                  | string  | _empty string_ |
|     href     | If set, the macro renders `<a>` instead of `<span>`            | string  | _empty string_ |
|   iconOnly   | Add the `badge-icononly` animation class                       | boolean |    `false`     |
|  extraClass  | Add custom classes                                             | string  | _empty string_ |
|     raw      | Use raw output for `content`                                   | boolean |    `false`     |                                        
|     attr     | Additional raw HTML attributes (`data-*`, `aria-*`, etc.)      | object  |      `{}`      |


### Usage

```twig
{% from '@Tabler/components/badge.html.twig' import badge %}

<h1>Example heading {{ badge({ content: 'New' }) }}</h1>

{{ badge({ content: 'Badge' }) }}

{{ badge({ content: 'Blue', color: 'blue' }) }}

{{ badge({ content: 'Blue', color: 'blue-lt' }) }}

{{ badge({ content: 'Blue', color: 'blue', outline: true }) }}

{{ badge({ content: 'Blue', color: 'blue', pill: true }) }}

{{ badge({ color: 'red', notification: true }) }}

{{ badge({ color: 'red', notification: true, blink: true }) }}

{{ badge({ content: 'New', color: 'primary', size: 'sm' }) }}

{% set content %}
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-2">
        <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"></path>
    </svg>
    Blue
{% endset %}
{{ badge({ content: content, raw : true, color: 'blue' }) }}

{% set content %}
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-2">
        <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"></path>
    </svg>
{% endset %}
{{ badge({ content: content, raw : true, iconOnly: true }) }}

{{ badge({ content: 'Blue', color: 'blue-lt', href: 'https://preview.tabler.io/badges.html' }) }}
```

## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
