# Components

This theme ships some components (as twig macros) that hide the complexity of rendering the same elements over and over again with the correct HTML.

## Progress Bar (single)

Progress Bar has been implemented to simplify the use of the Tabler Progress Bar component.

### Parameters
`progress_bar()` macro, waits for 2 parameters:

| Parameter | Description               |   Type   | Default |
|:---------:|:--------------------------|:--------:|:-------:|
|   item    | [Item](#Item) object      | `object` |  `{}`   |
|  options  | [Options](#Option) object | `object` |  `{}`   |

#### Item
|   Parameter   | Description                                                |   Type    |                      Default                      |
|:-------------:|------------------------------------------------------------|:---------:|:-------------------------------------------------:|
|     value     | Value of the item                                          | `integer` |                        `0`                        |
|      max      | Max value of the item                                      | `integer` |                        `0`                        |
|      min      | Min value of the item                                      | `integer` |                        `0`                        |
| indeterminate | Progress bar will be animated as 'loading' animation       | `boolean` |                      `false`                      |
|   autoLabel   | Define the progress label automatically                    | `boolean` |                      `false`                      |
|     label     | Label on the progress bar                                  | `string`  | `empty string` / if `autoLabel` -> `{{percent}}%` |
|   multiple    | Define if the progress will be with other progress         | `boolean` |                      `false`                      |
|     style     | Style to add to the progress                               | `string`  |                  *empty string*                   |     
|    striped    | Add stripped Boostrap background on the progress bar color | `boolean` |                      `false`                      |
|   animated    | Animate the stripped background                            | `boolean` |                      `false`                      |
| labelVisible  | Define if the label should be visible                      | `boolean` |                      `false`                      |
|     color     | Color of the progress bar (red, blue, ...)                 | `string`  |                  *empty string*                   |                                  
|     style     | Style to add to the progress bar                           | `string`  |                  *empty string*                   |     
|  extraClass   | Add custom classes to the progress bar                     |  string   |                  _empty string_                   |                                  
|     attr      | Additional raw HTML attributes (`data-*`, `aria-*`, etc.)  |  object   |                       `{}`                        |

#### Option
| Parameter  | Description                                               |   Type   |    Default     |
|:----------:|-----------------------------------------------------------|:--------:|:--------------:|
|   height   | Height of progress (1.5rem, 20px, ...)                    | `string` | *empty string* |        
|   style    | Style to add to the progress container                    | `string` | *empty string* | 
| extraClass | Add custom classes to the progress container              |  string  | _empty string_ |                                  
|    attr    | Additional raw HTML attributes (`data-*`, `aria-*`, etc.) |  object  |      `{}`      |                                   

### Usage

```twig
{% from '@Tabler/components/progress_bar.html.twig' import progress_bar %}

{{ progress_bar() }}

{{ progress_bar({current : 10}) }}

{{ progress_bar({current : 66, max : 100}) }}

{{ progress_bar({current : 40, max : 50, min : -50}) }}

{{ progress_bar({current : 66, max : 100, color : 'success'}, {extraClass : 'bg-danger'}) }}

{{ progress_bar({current : 66, max : 100, color : 'bg-orange'}, {height: '4px'}) }}

{{ progress_bar({current : 66, max : 100, autoLabel : true}) }}

{{ progress_bar({current : 66, max : 100, label : 'Partially done'}, {height: '20px'}) }}

{{ progress_bar({current : 66, max : 100, label : 'Error while processing', color : 'danger'}, {height: '20px'}) }}

{{ progress_bar({color : 'green'}, {extraClass : 'bg-green-lt'}) }}

{{ progress_bar({current :2, max: 5, color : 'red', striped : true}) }}

{{ progress_bar({current :4, max: 5, striped : true, animated: true}) }}
```

## Progress Bars (multiple)

Progress Bars has been implemented to simplify the use of the Progress Bar, with multiple progress bars in it.

### Parameters
`progress_bars()` macro, waits for 2 parameters:

| Parameter | Description                   |   Type   | Default |
|:---------:|:------------------------------|:--------:|:-------:|
|   items   | Array of [Item](#Item) object | `array`  |  `[]`   |
|  options  | [Options](#Option) object     | `object` |  `{}`   |

#### Option
| Parameter  | Description                                               |   Type   |    Default     |
|:----------:|-----------------------------------------------------------|:--------:|:--------------:|
|   height   | Height of all progress (1.5rem, 20px, ...)                | `string` | *empty string* |                                        
| separated  | Define if the sub progress bars have a blank between them | `string` | *empty string* |                                        
|   style    | Style to add to the progress bars container               | `string` | *empty string* | 
| extraClass | Add custom classes                                        |  string  | _empty string_ |                                  
|    attr    | Additional raw HTML attributes (`data-*`, `aria-*`, etc.) |  object  |      `{}`      |


### Usage

```twig
{% from '@Tabler/components/progress_bar.html.twig' import progress_bars %}

{{ progress_bars([
    {current :15, max: 100},
    {current :30, max: 100, color: 'success'},
    {current :20, max: 100, color: 'danger'},
]) }}

{{ progress_bars([
    {current :15, max: 100},
    {current :30, max: 100, color: 'success'},
    {current :20, max: 100, color: 'danger'},
], {separated : true}) }}

{{ progress_bars([
    {current :15, max: 100},
    {current :30, max: 100, color: 'success'},
    {current :20, max: 100, color: 'danger'},
], {height: '20px'}) }}
```

## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
