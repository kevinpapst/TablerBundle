# Using the layout

In order to use the layout, your views should extend from the provided `layouts`

```twig
{% extends '@Tabler/layout_horizontal.html.twig' %}
```

OR

```twig
{% extends '@Tabler/layout_vertical.html.twig' %}
```

## Layout files

This bundle ships with two main template files which you can extend in your theme.

**For all your admin pages**

The default `layout_horizontal.html.twig` can be used with:
```
{% extends '@Tabler/layout_horizontal.html.twig' %}
```

**For your security screens**

The `security.html.twig` file for login, register ... can be used with:   
```
{% extends '@Tabler/security.html.twig' %}
```

See example at [https://preview.tabler.io/sign-in.html](https://preview.tabler.io/sign-in.html)

**For your security screens (with huge cover image)**

The `security_cover.html.twig` file (for login, register, ...) can be used with:   
```
{% extends '@Tabler/security_cover.html.twig' %}
```

The cover image is configurable at `tabler.options.security_cover_url` or via `ConextHelper::setSecurityCoverUrl()`.

See example at [https://preview.tabler.io/sign-in-cover.html](https://preview.tabler.io/sign-in-cover.html)

**For your error pages**

The `error.html.twig` for all of your [error pages](error_pages.md):   
```
{% extends '@Tabler/error.html.twig' %}
```

**For full width pages**

The `fullpage.html.twig` file without header, menu, footer:   
```
{% extends '@Tabler/fullpage.html.twig' %}
```

## Twig Context-Helper

Instead of fully relying on blocks and includes, you are provided with a twig global named `tabler_bundle`.
Read the [Access bundle configuration](twig-context.md) chapter.

## Partials

In order to make it easier to overwrite template regions, there are several partials included.
Those can be overwritten individually as described [here](http://symfony.com/doc/current/templating/overriding.html). 

Listed in the order of appearance, these are:

- `@Tabler/includes/menu.html.twig`
- `@Tabler/includes/footer.html.twig`
- `@Tabler/includes/navbar_notifications.html.twig`
- `@Tabler/includes/navbar_user.html.twig`

## Layout blocks

The blocks are defined in the layout in order of appearance. 
Some of them contain major components like the navigation, or the entire content area. 

TODO explain blocks

## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
