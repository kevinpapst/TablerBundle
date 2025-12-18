# Embeds

This theme ships some embeds that hide the complexity of rendering the same elements over and over again with the correct HTML.

## Card vertical navigation

Card vertical navigation has been implemented to use the [Tabler Card vertical navigation](https://preview.tabler.io/settings.html#) extra card.

### Parameters
`Card vertical navigation` embed, can be used with 1 parameter:

| Parameter | Description            |   Type   | Default  |
|:---------:|------------------------|:--------:|:--------:|
|   items   | Array of [Item](#Item) | `array`  |   `[]`   |

#### Item

Note: If `href` parameter is not specified, Boostrap tab navigation will be used to navigate trough elements.
If `href` is specified, click on menu item will simply redirect to the URL.

| Parameter | Description                         |   Type    |         Default         |
|:---------:|-------------------------------------|:---------:|:-----------------------:|
|    id     | Id of item (used for bootstrap tab) | `string`  |      `uniqueId()`       |
|   name    | Name of the item                    | `string`  |     _empty string_      |
|  header   | Is item of type Header              | `boolean` |         `false`         |
|    raw    | Render item name as RAW HTML        | `boolean` |         `false`         |
|  content  | Content of the item                 | `string`  |     _empty string_      |
|  active   | Set the item as currently active    | `boolean` |         `false`         |
|   href    | Href of the `a` link in the menu    | `string`  | `#tabs-` + `uniqueId()` |

### Content
`Card vertical navigation` embed, has 1 common block:

|  Block  | Description                                                 |
|:-------:|-------------------------------------------------------------|
| content | Will replace the content autocomplete from Items -> content |

See twig file for more blocks, which allow customization of HTML tags, CSS classes and more.

### Usage
#### Full boostrap tabs navigation
All content tab must be rendered

```twig
{% set items = [
    {
        name: 'Account',
        content: '<h1>My Account</h1><h3>Profile Details</h3>'
    },
    {
        name: 'Notifications',
        content: include('notifications.html.twig')
    },
    {
        name: 'Experience',
        header: true
    },
    {
        name: 'Feedback',
        content: '<h1>Give Feedback</h1>'
    },
    {
        name: 'Automates',
        header: true
    },
    {
        id: 'auto',
        name: tabler_icon('robot') ~ " " ~ 'label.variable.automated.plural'|trans|capitalize,
        raw: true,
        content : _self.automate_content(mentions, automated_values)
    }
] %}

{% embed '@Tabler/embeds/card_vertical_navigation.html.twig' with {items : items} %}{% endembed %}
```

![card nav](https://user-images.githubusercontent.com/25293190/193552217-791b1294-811d-4cd8-8222-2cef684ef17c.gif)


#### Href single content navigation

Only one tab content is completed, rest is only for navigation between urls

```twig
{% set items = [
    {
        name: 'Account',
        href: '/account'
    },
    {
        name: 'Notifications',
        href: '/notifications',
        active: true,
    },
    {
        name: 'Experience',
        header: true
    },
    {
        name: 'Feedback',
    },
] %}

{% embed '@Tabler/embeds/card_vertical_navigation.html.twig' with {items : items} %}
    {% block content %}
        <h1>Notifications</h1>

        <p>Here's my content manually inserted!</p>
    {% endblock %}
{% endembed %}
```

![image](https://user-images.githubusercontent.com/25293190/194838070-b5fca872-713e-446d-a557-82b95c64819c.png)

#### Only nav card part (with empty content)

```twig
{% set items = [
    {
        name: 'Account',
        href: '/account'
    },
    {
        name: 'Notifications',
        href: '/notifications',
        active: true,
    },
    {
        name: 'Experience',
        header: true
    },
    {
        name: 'Feedback',
    },
] %}



<div class="row">
    <div class="col-3">
        {% embed '@Tabler/embeds/card_vertical_navigation.html.twig' with {items : items} %}
            {% block nav_size %}col{% endblock %}
            {% block nav_border %}{% endblock %}
            {% block content_display %}d-none{% endblock %}
            {% block content %}{% endblock %}
        {% endembed %}
    </div>
</div>
```
![image](https://user-images.githubusercontent.com/25293190/194849665-2c5d99f8-71f8-40ca-b05d-23950db225e4.png)


## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
