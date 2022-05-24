# Components

This theme ships some components (as twig macros) that hide the complexity of rendering the same elements over and over again with the correct HTML.

## Status indicator

Status indicator has been implemented to simplify the use of the Tabler [Status indicator component](https://preview.tabler.io/docs/statuses.html#status-indicator) 
### Parameters
`status_indicator()` macro, waits for 1 parameter:

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
{% from '@Tabler/components/status_indicator.html.twig' import status_indicator %}

<div class="row align-items-center text-start">
    <div class="col p-0">
        {{ status_indicator({color : item.open ? 'green' : 'red', animated : false, extraClass :'float-end' }) }}
    </div>
    <div class="col p-0">
        {{ item.open ? 'label.opened'|trans : 'label.closed'|trans }}
    </div>
</div>
```
### Preview
![image](https://user-images.githubusercontent.com/25293190/169996450-d8ed21aa-9606-45d9-a5c9-e85632867752.png)

## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
