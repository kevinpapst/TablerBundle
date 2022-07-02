# Components

This theme ships some components (as twig macros) that hide the complexity of rendering the same elements over and over again with the correct HTML.

## Status Dot

Status Dot has been implemented to simplify the use of the Tabler [Status Dot component](https://preview.tabler.io/docs/statuses.html#status-indicator) 
### Parameters
`status_dot()` macro, waits for 1 parameter:

| Parameter | Description                |   Type    | Default |
|:---------:|:---------------------------|:---------:|:-------:|
|  options  | [Options](#Options) object | `object`  |  `{}`   |

#### Options
| Parameter  | Description                      |   Type    |    Default     |
|:----------:|----------------------------------|:---------:|:--------------:|
|   color    | Color of the indicator           | `string`  |    `green`     |
|  animated  | Set if the indicator is animated | `boolean` |     `true`     |
| extraClass | Allow to add extra classes       | `string`  | _empty string_ |
                            
### Usage

```twig
{% from '@Tabler/components/status_dot.html.twig' import status_dot %}

{% set options = {'color': 'pink', 'animated': true} %}
{{ status_dot(options) }}
```
### Preview
![grafik](https://user-images.githubusercontent.com/3634653/176974526-35c6ca21-1d66-450a-b7d0-66c5cff41ed1.png)

## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
