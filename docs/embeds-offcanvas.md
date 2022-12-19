# Embeds

This theme ships some embeds that hide the complexity of rendering the same elements over and over again with the correct HTML.

## Offcanvas

Offcanvas has been implemented to simplify the use of the [Tabler Canvas component](https://preview.tabler.io/offcanvas.html)

### Parameters
`offcanvas` embed, can be used with 3 parameters:

| Parameter | Description                                                             |   Type    |            Default            |
|:---------:|-------------------------------------------------------------------------|:---------:|:-----------------------------:|
|    id     | Id of the container                                                     | `string`  | `offcanvas-` + random numbers |
| position  | Position of the offcanvas (top, end, bottom, start)                     | `string`  |             `end`             |
|  hidden   | Defined if `show` class is used to immediately show offcanvas on create | `boolean` |            `true`             |

### Content
`offcanvas` embed, has 2 common blocks:

|      Block      | Description                   |
|:---------------:|-------------------------------|
| offcanvas_title | Title in the offcanvas header |
| offcanvas_body  | Content of the offcanvas      |

See twig file for more customized blocks.

### Usage

```twig
{% embed '@Tabler/embeds/offcanvas.html.twig' with {position : 'top'} %}
    {% block offcanvas_title 'Top offcanvas' %}
    {% block offcanvas_body %}
    <div>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda ea est, eum exercitationem
        illum itaque laboriosam magni necessitatibus, nemo nisi numquam quae reiciendis repellat sit soluta.
        Aut!
    </div>
    {% endblock %}
{% endembed %}

{% embed '@Tabler/embeds/offcanvas.html.twig' with {position : 'end', hidden : false} %}
    {% block offcanvas_title 'End offcanvas' %}
{% endembed %}

{% embed '@Tabler/embeds/offcanvas.html.twig' with {position : 'bottom'} %}
    {% block offcanvas_title 'Bottom offcanvas' %}
{% endembed %}

{% embed '@Tabler/embeds/offcanvas.html.twig' with {position : 'start'} %}
    {% block offcanvas_title 'Start offcanvas' %}
{% endembed %}

{% embed '@Tabler/embeds/offcanvas.html.twig' %}
    {% block header %}{% endblock %} {# No Header => Remove X close button #}
{% endembed %}
```

## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
