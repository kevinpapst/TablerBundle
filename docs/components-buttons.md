# Components

This theme ships some components (as twig macros) that hide the complexity of rendering the same elements over and over again with the correct HTML.

## Button

There is one main button macro that has a bunch of possible options that you can pass in, it is the Swiss knife when it comes to buttons.

Please check the source code to see all available options, here are some demos:

```twig
{% from '@Tabler/components/button.html.twig' import button %}

{{ button('save', {title : 'Save'|trans}) }}
{{ button('save', {title : 'Save'|trans}, false) }}
{{ button('save', {title : 'Save'|trans, label: '1'}) }}
{{ button('save', {title : 'Save'|trans}, 'success') }}
{{ button(false , {title : 'Save'|trans}) }}
{{ button(false , {title : 'Save'|trans}, 'link') }}
{{ button(false , {title : 'Save'|trans}, 'success') }}
{{ button('save', {title : 'Save'|trans, combined: true}, 'success') }}
{{ button('save', {title : 'Save'|trans, combined: true, label: 'test', labelColor: 'red'}, 'success') }}
```

## Other buttons

There are some other button components for specialized situations (like a submit button, or an action button inside a card header) :

### Submit buttons

```twig
{% from '@Tabler/components/buttons.html.twig' import submit_button %}

{{ submit_button('save') }}
```

### Action button

TODO 

```twig
{% from '@Tabler/components/buttons.html.twig' import action_button %}

{% macro action_button(label, action, icon, type, size) %}
```

### Link button

TODO

```twig
{% from '@Tabler/components/buttons.html.twig' import link_button %}

{% macro link_button(label, href, icon, type, size) %}
```

### Collapse button

TODO

```twig
{% from '@Tabler/components/buttons.html.twig' import action_collapsebutton %}

{% macro action_collapsebutton(label, target) %}
```

### Card-Tool button

TODO

```twig
{% from '@Tabler/components/buttons.html.twig' import action_cardtoolbutton %}

{% macro action_cardtoolbutton(icon, attrs) %}
```

### Dropdown button

#### Parameters
| Parameter | Description              |   Type    | Default |
|:---------:|:-------------------------|:---------:|:-------:|
|  values   | [Button](#Button) object | `object`  |  `{}`   |
|   items   | Array of [Item](#Item)   |  `array`  |  `[]`   |
|  options  | Options object           | `object`  |  `{}`   |

#### Item
| Parameter | Description                                                                 |   Type    | Default |
|:---------:|-----------------------------------------------------------------------------|:---------:|:-------:|
|   icon    | Tabler icon name                                                            | `boolean` | `false` |
|   title   | Title of the item                                                           |  `html`   | `null`  |
|   href    | Href of the item                                                            | `string`  |   `#`   |
|   class   | Custom class for dropdown item. Results in class like `dropdown-item class` | `string`  | `null`  |

```twig
{% from '@Tabler/components/buttons.html.twig' import dropdown_button %}

{{ dropdown_button(
    {icon: 'plus', title : 'Actions'},
    [
        {icon: 'plus',      title : 'Add more',     href : '/add'},
        {                   title : 'Help needed',  href : '/help'},
        {icon: 'delete',    title : 'Delete',       href : '/delete', class : 'my-class' }
    ]
) }}

{{ dropdown_button(
    {icon: 'plus'},
    [
        {title : 'Add more'},
        {title : 'Help needed'},
        {title : 'Delete'}
    ]
) }}

{{ dropdown_button(
    {title : 'Actions'},
    [
        {title : 'Add more'},
        {title : 'Help needed'},
        {title : 'Delete'}
    ]
) }}
```


## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
