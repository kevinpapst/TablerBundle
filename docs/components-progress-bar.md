# Components

This theme ships some components (as twig macros) that hide the complexity of rendering the same elements over and over again with the correct HTML.

## Progress Bar (single)

Progress Bar has been implemented to simplify the use of the Tabler Progress Bar component.
`progress_bar()` is a Shortcut of `progress_bars()` with an array of ONE item.

### Parameters
`progress_bar()` macro, waits for 2 parameters:

| Parameter | Description               |   Type   | Default |
|:---------:|:--------------------------|:--------:|:-------:|
|   item    | [Item](#Item) object      | `object` |  `{}`   |
|  options  | [Options](#Option) object | `object` |  `{}`   |

#### Item
|   Parameter   | Description                                                |   Type    |                      Default                      |
|:-------------:|------------------------------------------------------------|:---------:|:-------------------------------------------------:|
|    current    | Current value of the item                                  | `integer` |                        `0`                        |
|      max      | Max value of the item                                      | `integer` |                        `0`                        |
|      min      | Min value of the item                                      | `integer` |                        `0`                        |
| indeterminate | Progress bar will be animated as 'loading' animation       | `boolean` |                      `false`                      |
|    striped    | Add stripped Boostrap background on the progress bar color | `boolean` |                      `false`                      |
|   animated    | Animate the stripped background                            | `boolean` |                      `false`                      |
|   autoLabel   | Define the progress label automatically                    | `boolean` |                      `false`                      |
|     label     | Label on the progress bar                                  | `string`  | `empty string` / if `autoLabel` -> `{{percent}}%` |
| labelVisible  | Define if the label should be visible                      | `boolean` |                      `false`                      |
|     color     | Color of the progress bar                                  | `string`  |                  *empty string*                   |                                  
|     style     | Style to add to the progress bar                           | `string`  |                  *empty string*                   |     

#### Option
|    Parameter    | Description                                    |   Type   |    Default     |
|:---------------:|------------------------------------------------|:--------:|:--------------:|
|  progressSize   | Size of the progress bar                       | `string` | *empty string* |                                        
| backgroundColor | background color of the progress bar container | `string` | *empty string* |                                        
|      style      | Style to add to the progress bar container     | `string` | *empty string* | 

### Usage

```twig
{% from '@Tabler/components/progress_bar.html.twig' import progress_bar %}

{{ progress_bar() }}

{{ progress_bar({current : 1}) }}

{{ progress_bar({current : 2, max : 3, min : -1}) }}

{{ progress_bar({current : 2, max : 3}) }}

{{ progress_bar({current : 2, max : 3, color : 'bg-red'}, {backgroundColor : 'bg-grey'}) }}

{{ progress_bar({current : 2, max : 3, color : 'bg-green'}, {progressSize : 'progress-sm'}) }}

{{ progress_bar({current : 2, max : 3, color : 'bg-orange'}, {style : 'height: 20px;'}) }}

{{ progress_bar({color : 'bg-red'}, {backgroundColor : 'bg-grey'}) }}

{{ progress_bar({current :2, max: 5, color : 'bg-red', striped : true}) }}

{{ progress_bar({current :2, max: 5, striped : true, animated: true}) }}
```

## Progress Bars (multiple)

Progress Bars has been implemented to simplify the use of the Progress Bar, with multiple progress bars in it.

### Parameters
`progress_bars()` macro, waits for 2 parameters:

| Parameter | Description                   |   Type   | Default |
|:---------:|:------------------------------|:--------:|:-------:|
|   items   | Array of [Item](#Item) object | `array`  |  `[]`   |
|  options  | [Options](#Option) object     | `object` |  `{}`   |

### Usage

```twig
{% from '@Tabler/components/progress_bar.html.twig' import progress_bars %}

{{ progress_bars([
    {current :15, max: 100},
    {current :30, max: 100, color: 'bg-success'},
    {current :20, max: 100, color: 'bg-danger'},
]) }}
```

## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
