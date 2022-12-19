# Components

This theme ships some components (as twig macros) that hide the complexity of rendering the same elements over and over again with the correct HTML.

See Tabler documentation at https://preview.tabler.io/docs/alerts.html#important-alerts

## Callout

```
{% from '@Tabler/components/callout.html.twig' import callout %}

{{ callout({type: 'success', description: 'Your account has been saved!', icon: 'fas fa-check'}) }}
{{ callout({type: 'primary', description: 'Here is something that you might like to know.', icon: 'fas fa-info'}) }}
{{ callout({type: 'warning', description: 'Sorry! There was a problem with your request.', icon: 'fas fa-exclamation-triangle'}) }}
{{ callout({type: 'danger', description: 'Your account has been deleted and cannot be restored.', icon: 'fas fa-skull'}) }}
```

## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
