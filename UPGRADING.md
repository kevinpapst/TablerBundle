# Changelog

## 2.0

### Removed "tabler_asset_version"

- Removed twig function `tabler_asset_version()` 
- Removed `ContextHelper::setAssetVersion()`/`ContextHelper::getAssetVersion()` 
- Removed the options `tabler.options.asset_version`

### File name convention
Removes all legacy **kebab-case** Twig template names and only ships **snake_case** equivalents:
- Layout horizontal: `layout-horizontal.html.twig` → `layout_horizontal.html.twig`
- Layout vertical: `layout-vertical.html.twig` → `layout_vertical.html.twig`
- Security cover: `security-cover.html.twig` → `security_cover.html.twig`
- Form theme: `form-theme.html.twig` → `form_theme.html.twig`
- Form theme vertical: `form-theme-vertical.html.twig` → `form_theme_vertical.html.twig`
- Form theme horizontal: `form-theme-horizontal.html.twig` → `form_theme_horizontal.html.twig`
- Card vertical navigation : `card-vertical-navigation.html.twig` → `card_vertical_navigation.html.twig`

### Changed HTML structure 

See https://github.com/kevinpapst/TablerBundle/pull/214

Removed two central HTML container from the layouts
- `<div class="row row-cards">` (this one was a mistake, introduced by us in 1.0) 
- `<section id="{% block page_content_id %}{% endblock %}" class="{% block page_content_class %}content{% endblock %}">`

The `<section>` container is not part of Tabler itself, so we decided to remove it from the layouts.
If you relied on it, you can add this simple workaround:

```twig
{% block page_content_before %}
    <section class="content {% block page_class %}{% endblock %}">
{% endblock %}
{% block page_content_after %}
    </section>
{% endblock %}
```

## New theme options

New config options available (also available as getter/setter in ContextHelper):

```yaml
tabler:
    options:
        # if "true" uses javascript to detect the OS mode and ignores dark_mode
        theme_auto: false
        # slate, gray, zinc, neutral, stone
        theme_base: "slate"
        # 0, 0.5, 1, 1.5, 2 | radius in pixels * 4
        theme_radius: "0.5"
        # blue, azure, indigo, purple, pink, red, orange, yellow, lime, green, teal, cyan
        theme_primary: "blue"
```
