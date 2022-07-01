# Components

This theme ships some components (as twig macros) that hide the complexity of rendering the same elements over and over again with the correct HTML.

## Status indicator

Status has been implemented to simplify the use of the Tabler [Status component](https://preview.tabler.io/docs/statuses.html) 
### Parameters
`status()` macro, waits for 2 parameters:

| Parameter | Description                |   Type    | Default |
|:---------:|:---------------------------|:---------:|:-------:|
|  text     | Text to show in the status | `string`  |     |
|  options  | [Options](#Options) object | `object`  |  `{}`   |

#### Options
| Parameter  | Description                      |   Type    |    Default     |
|:----------:|----------------------------------|:---------:|:--------------:|
|   color    | Color of the status              | `string`  |    `green`     |
|  lite      | Set if the status should use the lite display | `boolean` |     `false`     |
|  with_dot      | Set if the status should use a dot | `boolean` |     `false`     |
|  animated  | Set if the status dot is animated    | `boolean` |     `true`     |
| extraClass | Allow to add extra classes       | `string`  | _empty string_ |
                            
### Usage

```twig
{% from '@Tabler/components/status.html.twig' import status %}

{% set options = {'color': 'success', 'with_dot': true,'animated': true, 'lite': false, 'extraClass': 'me-3'} %}
{{ status('Demo', options) }}
```
### Preview
![grafik](https://user-images.githubusercontent.com/3634653/176974136-b2ef1703-a9f4-4fe4-b3ac-85fb37f6e63b.png)

## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
