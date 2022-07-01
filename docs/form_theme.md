# Form theme

This bundle does ship three form-themes:
- [templates/layout/form-theme.html.twig](templates/layout/form-theme.html.twig)
- [templates/layout/form-theme-horizontal.html.twig](templates/layout/form-theme-horizontal.html.twig)
- [templates/layout/form-theme-security.html.twig](templates/layout/form-theme-security.html.twig)

None of these themes is automatically loaded, you have to use it manually.

## Use the vertical theme

To use the horizontal theme everywhere in your application edit `config/packages/twig.yaml`:

```yaml
twig:
    form_themes:
        - '@Tabler/layout/form-theme.html.twig'
```

To use it only for one form, change your twig file:

```twig
    {% form_theme form '@Tabler/layout/form-theme.html.twig' %}
    {{ form_start(form) }}
```

This theme extends Symfony Bootstrap 5 theme, which can be used instead without problems.
If we ever add features to the form theme, they will be optional and only cosmetic.

## Use the horizontal theme

To use the horizontal theme everywhere in your application edit `config/packages/twig.yaml`:

```yaml
twig:
    form_themes:
        - '@Tabler/layout/form-theme-horizontal.html.twig'
```

To use it only for one form, change your twig file:

```twig
    {% form_theme form '@Tabler/layout/form-theme-horizontal.html.twig' %}
    {{ form_start(form) }}
```

This theme extends Symfony Bootstrap 5 Horizontal theme, which can be used instead without problems.
If we ever add features to the form theme, they will be optional and only cosmetic.

## Use the security theme

The security theme is ONLY meant for the registration/login pages.
Please set it manually if you customize these pages:

```twig
    {% form_theme form '@Tabler/layout/form-theme-security.html.twig' %}
```

## Icons in input-groups

If you want to show icons in your forms inputs, you could add this code to your own form theme:

```twig
{% block date_widget %}
    {% if widget == 'single_text' %}
        <div class="input-group">
            <div class="input-group-text">
                {{ tabler_icon('calendar') }}
            </div>
            {{- parent() -}}
        </div>
    {% else %}
        {{- parent() -}}
    {% endif %}
{% endblock %}

{% block time_widget %}
    {% if widget == 'single_text' %}
        <div class="input-group">
            <div class="input-group-text">
                {{ tabler_icon('clock') }}
            </div>
            {{- parent() -}}
        </div>
    {% else %}
        {{ parent() }}
    {% endif %}
{% endblock %}

{% block datetime_widget -%}
    {%- if widget == 'single_text' -%}
        <div class="input-group">
            <div class="input-group-text">
                {{ tabler_icon('calendar') }}
            </div>
            {{- parent() -}}
        </div>
    {%- else -%}
        {{- parent() -}}
    {%- endif -%}
{%- endblock datetime_widget %}

{% block tel_widget -%}
    <div class="input-group">
        <div class="input-group-text">
            {{ tabler_icon('phone') }}
        </div>
        {{- parent() -}}
    </div>
{%- endblock tel_widget %}

{% block url_widget -%}
    <div class="input-group">
        <div class="input-group-text">
            {{ tabler_icon('home') }}
        </div>
        {{- parent() -}}
    </div>
{%- endblock url_widget %}

{% block email_widget -%}
    <div class="input-group">
        <div class="input-group-text">
            {{ tabler_icon('email') }}
        </div>
        {{- parent() -}}
    </div>
{%- endblock email_widget %}

{% block password_widget -%}
    <div class="input-group">
        <div class="input-group-text">
            {{ tabler_icon('password') }}
        </div>
        {{- parent() -}}
    </div>
{%- endblock password_widget %}
```

Please read Symfony / Twig documentation if you don't know how to use this.

## Next steps

Please go back to the [Tabler bundle documentation](README.md) to find out more about using the theme.
