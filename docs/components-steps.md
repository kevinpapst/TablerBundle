# Components

This theme ships some components (as twig macros) that hide the complexity of rendering the same elements over and over again with the correct HTML.

## Steps

Steps has been implemented to simplify the use of the Tabler Steps component.

### Parameters
`steps()` macro, waits for 2 parameters:

| Parameter | Description                |   Type    | Default |
|:---------:|:---------------------------|:---------:|:-------:|
|   steps   | Array of [Step](#Step)     |  `array`  |  `[]`   |
|  options  | [Options](#Options) object | `object`  |  `{}`   |

#### Step
|  Parameter  | Description                                |   Type    |      Default      |
|:-----------:|--------------------------------------------|:---------:|:-----------------:|
|    href     | Url href for the step when clicked         | `string`  |        `#`        |
|    title    | Title of the step                          | `string`  |  _empty string_   |
| description | Description used as `title` HTML attribute | `string`  |   _title value_   |
|   active    | Set if item is active                      | `boolean` |      `false`      |
|  clickable  | Allow click on step (change `a` to `span`) | `boolean` |      `true`       |
|    attr     | Allow custom attributes on step            | `object`  |       `{}`        |
| extraClass  | Add extra classes on step                  | `string`  |  _empty string_   |

#### Options
| Parameter  | Description                                          |   Type    |    Default     |
|:----------:|------------------------------------------------------|:---------:|:--------------:|
|  tooltip   | Set if bootstrap tooltip will be shown at step hover | `boolean` |    `false`     |                                        
|   color    | Color of the steps                                   | `string`  |   `primary`    |                                        
|  counter   | Enable step counter on each item                     | `boolean` |    `false`     | 
|    attr    | Allow custom attributes on steps container           | `object`  |      `{}`      |   
| extraClass | Add extra classes on steps container                 | `string`  | _empty string_ |      

### Usage

```twig
{% from '@Tabler/components/steps.html.twig' import steps %}

{{ steps([
    {title : 'Step 1', clickable : false},
    {title : 'Step 2'},
    {title : 'Step 3', active : true},
    {title : 'Step 4', description : 'More detailed description'},
    {title : 'Step 5', href: 'https://www.google.com', clickable : true},
],{
    tooltip : true,
    color: 'red',
    counter : true,
}) }}
```
### Preview

![steps2](https://user-images.githubusercontent.com/25293190/170020661-55a08217-3a9e-4d04-8252-333efadf3989.gif)

## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
