# Avatar Component

This theme ships some components (as twig macros) that hide the complexity of rendering consistent Tabler elements with the correct HTML and classes.

See avatar documentation at https://preview.tabler.io/avatars.html

## Avatar

### Parameters

| Parameter | Description                |   Type   |   Default    |
|:---------:|:---------------------------|:--------:|:------------:|
|  options  | [Options](#Options) object | `object` |     `{}`     | 

### Options

| Parameter  | Description                                                                                         |   Type   |    Default     |
|:----------:|:----------------------------------------------------------------------------------------------------|:--------:|:--------------:|
|  content   | Inner HTML content of the avatar (SVG, initials, icon, etc.), rendered raw                          |  string  | _empty string_ |
|  imageUrl  | Image URL for background avatar                                                                     |  string  | _empty string_ |
|   color    | Background color using Tabler color classes (`blue`, `red`, `primary`, `yellow-lt`, etc.)           |  string  | _empty string_ |
|    size    | Avatar size (`xs`, `sm`, `md`, `lg`, `xl`, etc.)                                                    |  string  | _empty string_ |
|  rounded   | Enables rounded corners — `true` = `rounded`, or a number for `rounded-*` classes                   | bool/int |    `false`     |
|   circle   | Shortcut for `rounded-circle`                                                                       |   bool   |    `false`     |
|   badge    | A nested badge options object to render a [components badge](components-badge.md) inside the avatar |  object  |      `{}`      |
| extraClass | Additional CSS classes                                                                              |  string  | _empty string_ |
|    attr    | Raw HTML attributes (`data-*`, `aria-*`, etc.)                                                      |  object  |      `{}`      |

### Usage

#### Basic Usage

```twig
{% from '@Tabler/components/avatar.html.twig' import avatar %}
{{ avatar({ imageUrl: '/img/avatars/1.png' }) }}
```

#### With Size
```twig
{% from '@Tabler/components/avatar.html.twig' import avatar %}
{{ avatar({ imageUrl: '/img/avatars/1.png', size: 'lg' }) }}
```

#### With Background Color & No Image
```twig
{% from '@Tabler/components/avatar.html.twig' import avatar %}
{{ avatar({
    content: 'FC',
    color: 'blue-lt',
}) }}
```

#### Rounded & Circle Variants
```twig
{% from '@Tabler/components/avatar.html.twig' import avatar %}
{{ avatar({
    imageUrl: '/img/avatars/1.png',
    rounded: true,
}) }}

{{ avatar({
    imageUrl: '/img/avatars/1.png',
    rounded: 4,
}) }}

{{ avatar({
    imageUrl: '/img/avatars/1.png',
    circle: true,
}) }}
```

#### With Badge
```twig
{% from '@Tabler/components/avatar.html.twig' import avatar %}
{{ avatar({
    imageUrl: '/img/avatars/1.png',
    badge: {
        content: '3',
        color: 'red',
        notification: true,
    }
}) }}
```

#### Using Raw Content (SVG, icons, etc.)
```twig
{% from '@Tabler/components/avatar.html.twig' import avatar %}
{% set svg %}
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
     viewBox="0 0 24 24" fill="currentColor" class="icon">
    <path d="M12 3l7 7-7 7-7-7z"/>
</svg>
{% endset %}

{{ avatar({
    content: svg,
    color: 'green-lt'
}) }}

{{ avatar({
    content: tabler_icon('user'),
    color: 'green-lt'
}) }}
```

#### Extra data
```twig
{% from '@Tabler/components/avatar.html.twig' import avatar %}
{{ avatar({
    content: 'FC',
    extraClass: 'sticky-top',
    attr : {
        'attr-id' : 1234,
    }
}) }}
```

## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
