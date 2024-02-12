# Dynamic configuration - Context-Helper

## Setting dynamic theme options

Using a EventSubscriber you can set global theme options, e.g. by Cookies or from your user profile.

```php
use KevinPapst\TablerBundle\Helper\ContextHelper;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\KernelEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class TablerThemeOptionsSubscriber implements EventSubscriberInterface
{
    public function __construct(private readonly ContextHelper $contextHelper) 
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => ['setThemeOptions', 100],
        ];
    }

    public function setThemeOptions(KernelEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }

        if ($event->getRequest()->cookies->has('tablerTheme')) {
            $tablerTheme = $event->getRequest()->cookies->get('tablerTheme');
            $darkMode    = $tablerTheme === "dark";
            $this->contextHelper->setIsDarkMode($darkMode);
            if ($darkMode) {
                $this->contextHelper->setIsHeaderDark(true);
                $this->contextHelper->setIsNavbarDark(true);
            }
        }
    }
}
```

### Setting options

You can use it to retrieve theme related settings, but you can also use it as parameter bag
to carry values from your backend to any place in your template with the method:

- `setOption(string $name, $value): void`
- `hasOption(string $name): bool`
- `getOption(string $name, $default = null): mixed`
- `getOptions(): array` - will return yours and also all Tabler bundler related settings

## Reading configurations in Twig

Instead of fully relying on blocks and includes, you are additionally provided with a twig global named `tabler_bundle`.

This gives you access to the following configurations within your twig template:
```
{% set isDarkMode = tabler_bundle.darkMode %}
{% set isBoxedLayout = tabler_bundle.boxedLayout %}
{% set isRightToLeft = tabler_bundle.rightToLeft %}
{% set isRightToLeft = tabler_bundle.condensedUserMenu %}
{% set isCondensedNavbar = tabler_bundle.condensedNavbar %}
{% set logoUrl = tabler_bundle.logoUrl %}
```

With these functions, you can simply adapt your templates if a configured setting is active:
```
{% if tabler_bundle.darkMode %}
Display dark mode content only
{% endif %}
```

## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
