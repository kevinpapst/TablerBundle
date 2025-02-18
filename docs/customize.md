# Customize

As Tabler uses Bootstrap, you can use the same methods described in the [Bootstrap documentation](https://getbootstrap.com/docs/5.3/customize/color/).  
Here is a basic example that can be customized according to your requirements.

```scss
// assets/styles/theme.scss
@import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap");
@import url('https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@300;400;500;700&display=swap');

// All variables available here: https://github.com/tabler/tabler/blob/main/src/scss/_variables.scss
$primary: #34495e;
$secondary: #9b59b6;
$success: #2ecc71;
$info: $secondary;
$warning: #e67e22;
$danger: #e74c3c;

$h1-font-size: 2rem;
$h2-font-size: 1.5rem;
$h3-font-size: 1.3rem;
$h4-font-size: 1.2rem;

$font-family-sans-serif: Ubuntu, sans-serif;
$font-family-monospace: "Ubuntu Mono", Consolas, sans-serif;

// Custom
$opal: #a0c0bc;
$nav-link-color: $opal;

@import '@tabler/core/src/scss/tabler';
```

Then, import it in the first position into your `app.scss` file:
```scss
// assets/app.scss
@import url("./theme.scss");

// [...]
```

Finally, do not forget to add your `app` entry link in your `base.html.twig`:
```twig
{# templates/base.html.twig #}
{% extends '@Tabler/layout-vertical.html.twig' %}

{% block stylesheets %}
    {{ encore_entry_link_tags('app') }}
{% endblock %}
```

## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
