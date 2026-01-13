# Components

This theme ships some components (as twig macros) that hide the complexity of rendering the same elements over and over again with the correct HTML.

See Tabler documentation at https://preview.tabler.io/dropdowns.html

## Dropdown

### Parameters
`dropdown()` macro, waits for 2 parameters:

| Parameter | Description                |   Type   | Default |
|:---------:|:---------------------------|:--------:|:-------:|
|   items   | Array of [Item](#Item)     | `array`  |  `[]`   |
|  options  | [Options](#Options) object | `object` |  `{}`   |

#### Item
| Parameter  | Description                                                                        |        Type        |    Default     |
|:----------:|------------------------------------------------------------------------------------|:------------------:|:--------------:|
|    type    | Type of item. Can be: `html`,`divider`,`header`,`link`,`radio`,`checkbox`,`switch` |      `string`      |     `link`     |
|   title    | Title of the item                                                                  |      `string`      | _empty string_ |
|    icon    | Icon tabler as prefix                                                              | `string / boolean` |    `false`     |
|    html    | Content `HTML`                                                                     | `string / boolean` |    `false`     |
|    href    | Url of the item                                                                    |      `string`      |      `#`       |
|   badge    | Object to define badge option                                                      |      `Object`      |      `{}`      |
|   active   | Add `active` class                                                                 |     `boolean`      |    `false`     |
|  disabled  | Add `disabled` class                                                               |     `boolean`      |    `false`     |
| extraClass | Add custom class to the item                                                       |      `string`      | _empty string_ |
|    attr    | Custom HTML attributes to add to the item                                          |      `Object`      |      `{}`      |

##### Item Options
|    Parameter    | Description                      |   Type    |    Default     |
|:---------------:|----------------------------------|:---------:|:--------------:|
|      open       | Item should be opened by default | `boolean` |    `false`     |
| titleExtraClass | Add extra class to the title     | `string`  | _empty string_ |
| bodyExtraClass  | Add extra class to the body      | `string`  | _empty string_ |

#### Options
|    Parameter     | Description                             |   Type    |    Default     |
|:----------------:|-----------------------------------------|:---------:|:--------------:|
| menuAlignmentEnd | Align to end the dropdown menu          | `boolean` |    `false`     |     
|    menuArrow     | Add the Arrow to the dropdown           | `boolean` |    `false`     |                                        
|    extraClass    | Add extra classes on dropdown container | `string`  | _empty string_ |      

### Usage

```twig
{% from '@Tabler/components/dropdown.html.twig' import dropdown %}

{{ dropdown([
    {
        type: 'header',
        title:'Dropdown header',
    },
    {
        title: 'Item 1',
        icon: 'about',
    },
    {
        title: 'Item 2',
        icon: 'admin',
    },
    {
        type: 'html',
        html: '
            <a href="#" class="text-reset">My profile</a>
            <label class="form-check m-0 ms-auto">
                <input type="checkbox" class="form-check-input">
                Public
            </label>
        '
    },
    {
        type: 'radio',
        title: 'Radio input',
        html: '<input class="form-check-input m-0 me-2" type="radio">'
    },
    {
        type: 'checkbox',
        title: 'Checkbox input',
        html: '<input class="form-check-input m-0 me-2" type="checkbox">',
    },
    {
        type: 'checkbox',
        title: 'Checkbox input',
        html: '<input class="form-check-input m-0 me-2" type="checkbox">',
        disabled: true,
    },
    {
        type: 'checkbox',
        title: 'Checkbox input',
        html: '<input class="form-check-input m-0 me-2" type="checkbox">',
        active: true,
    },
    {
        type: 'switch',
        title: 'Checkbox input',
        html: '<input class="form-check-input m-0 me-2" type="checkbox">'
    },
    {
        type: 'divider',
    },
    {
        title: 'Dropdown item 1',
    },
    {
        title: 'Dropdown item 2',
    },
    {
        title: 'Dropdown disabled',
        disabled: true,
    },
    {
        title: 'Dropdown active',
        active: true,
    },
    {
        type: 'divider',
    },
    {
        title: 'Kevin Papst',
        html: '<span class="avatar avatar-xs rounded me-2" style="background-image: url(https://avatars.githubusercontent.com/u/533162)"></span>'
    },
    {
        title: 'Florian Cavasin',
        html: '<span class="avatar avatar-xs rounded me-2" style="background-image: url(https://avatars.githubusercontent.com/u/25293190)"></span>'
    },
    {
        title: 'Firstname Lastname',
        html: '<span class="avatar avatar-xs rounded me-2">FL</span>'
    },
    {
        type: 'divider',
    },
    {
        title: 'Logout',
        icon: 'back',
    },
], {extraClass : 'bg-dark text-white', menuArrow: true, menuAlignmentEnd: true}) }}
```

## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
