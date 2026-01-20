# Changelog

## 2.1

### tabler_icon

The `tabler_icon` feature is deprecated and should no longer be used.

#### What changed

Historically, TablerBundle provided its own icon rendering and aliasing layer:

- Icons were configured in `tabler.yaml` under `tabler.icons`
- Icons were rendered through the `tabler_icon` Twig extension

This approach is being phased out in favor of Symfony UX Icons, which is now the recommended and supported way to render icons and manage aliases.

#### What to use instead

Use the Symfony UX icon system:

- Render icons with `ux_icon(...)`
- Configure aliases in `ux_icons.yaml` using the [`aliases` section](https://symfony.com/bundles/ux-icons/current/index.html#icon-aliases)

This fully replaces the previous `tabler.yaml` -> `icons` configuration.

#### Migration steps

1. Move icon aliases from `tabler.yaml` to `ux_icons.yaml` under `ux_icons.aliases`.
2. Go to [Ux icon search page](https://ux.symfony.com/icons?set=tabler) and find related icon to yours before   
    1. Previous configuration (`tabler.yaml`):
    ```yaml
    tabler:
        icons:
            user: fas fa-user
            settings: fas fa-cogs
            thumb_up: thumbs-up
    ```
    
    2. New configuration (`ux_icons.yaml`):
    ```yaml
    ux_icons:
        aliases:
            user: tabler:user
            settings: tabler:settings
            thumb_up: tabler:thumb-up
    ```
3. Rename all usages of `tabler_icon` in Twig templates to `ux_icon`.   
    1. Before:
    ```twig
    {{ tabler_icon('user') }}
    ```
   
    2. After:
    ```twig
    {{ ux_icon('user') }}
    ```

#### Notes

- Direct icon identifiers such as `tabler:user` can still be used directly with `ux_icon(...)`.
- Aliases are optional and only required if you want to keep short logical icon names.
- Support for `tabler_icon` will be removed in a future major version `3.0`.

### Dropdown

In macro `dropdown()`:
- Deprecated the options `menuArrowEnd`, replaced by `menuAlignmentEnd`

## 2.0

### Removed "tabler_asset_version"

- Removed twig function `tabler_asset_version()` 
- Removed `ContextHelper::setAssetVersion()`/`ContextHelper::getAssetVersion()` 
- Removed the options `tabler.options.asset_version`

### Added `url` as `href` replacement for a unified API

The old parameter name 'url' is not deprecated; the recommended parameter name is now 'href'.
Due to the potential scale of usage, we have made this an opt-in feature.

- Added in [templates/components/button.html.twig](templates/components/button.html.twig)
- Added in [templates/components/buttons.html.twig](templates/components/buttons.html.twig)
- Added in [templates/embeds/card_nav_header.html.twig](templates/embeds/card_nav_header.html.twig)
- Added in [templates/embeds/card_vertical_navigation.html.twig](templates/embeds/card_vertical_navigation.html.twig)

### File name convention

Deprecates all legacy **kebab-case** Twig template names. Please use their **snake_case** equivalents:

- Layout horizontal: `layout-horizontal.html.twig` → `layout_horizontal.html.twig`
- Layout vertical: `layout-vertical.html.twig` → `layout_vertical.html.twig`
- Security cover: `security-cover.html.twig` → `security_cover.html.twig`
- Form theme: `layout/form-theme.html.twig` → `layout/form_theme.html.twig`
- Form theme vertical: `layout/form-theme-vertical.html.twig` → `layout/form_theme_vertical.html.twig`
- Form theme horizontal: `layout/form-theme-horizontal.html.twig` → `layout/form_theme_horizontal.html.twig`
- Card vertical navigation : `embeds/card-vertical-navigation.html.twig` → `embeds/card_vertical_navigation.html.twig`

### Progress bar

In macro `progress_bar()`:

- Item value `current` deprecated, replaced by `value`
- Item value `color` should not be "bootstrap classes" value, but it's color directly like `red`, `blue`, ...
- Deprecated the options `backgroundColor` (will be used as extraClass if still defined)
- Deprecated the options `progressSize`  (will be used as extraClass if still defined)

### Progress bars

In macro `progress_bars()`:

- Deprecated the options `backgroundColor` (will be used as extraClass if still defined)

### Avatar

- Deprecated the old macro signature `{% macro avatar(user, size) %}` in favor of `{% macro avatar(options) %}`

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

### New theme options

New config options available, also as getter/setter in ContextHelper:

```yaml
tabler:
    options:
        # if "true" uses javascript to detect the OS mode and ignores dark_mode
        theme_auto: false
        # slate, gray, zinc, neutral, stone
        theme_base: "gray"
        # 0, 0.5, 1, 1.5, 2 | radius in pixels * 4
        theme_radius: 1
        # blue, azure, indigo, purple, pink, red, orange, yellow, lime, green, teal, cyan
        theme_primary: "blue"
```
