# Menu component

Although the `MenuItemInteface` as well as the `MenuItemModel` are designed to support an unlimited depth, 
the menu is currently limited to two levels.

## Data Model

In order to use this component, your have to create a `MenuItemModel` class that implements `\KevinPapst\TablerBundle\Model\MenuItemInterface`:
```php
<?php
namespace App\Model;

use KevinPapst\TablerBundle\Model\MenuItemInterface;

class MenuItemModel implements MenuItemInterface
{
    // implement interface methods
}
```
The bundle provides the `MenuItemModel` as a ready to use implementation of the `MenuItemInterface`. 
You can use it to create a menu item:

```php
$menuItem = new \KevinPapst\TablerBundle\Model\MenuItemModel('item', 'Item', 'item_route_name');
```

or a menu label:
```php
$menuLabel = new \KevinPapst\TablerBundle\Model\MenuItemModel('label', 'Label', null);
```

## EventSubscriber

In case you activated service discovery and auto-wiring in your app, you can write an EventSubscriber which will 
be automatically registered in your container:

```php
<?php
namespace App\EventSubscriber;

use KevinPapst\TablerBundle\Event\MenuEvent;
use KevinPapst\TablerBundle\Model\MenuItemModel;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MenuBuilderSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            MenuEvent::class => ['onSetupMenu', 100],
        ];
    }
    
    public function onSetupMenu(MenuEvent $event)
    {
        $blog = new MenuItemModel('blogId', 'Blog', 'item_symfony_route', [], 'fas fa-tachometer-alt');
    
        $blog->addChild(new MenuItemModel('ChildOneItemId', 'ChildOneDisplayName', 'child_1_route', [], 'fas fa-rss-square'));
        $blog->addChild(new MenuItemModel('ChildTwoItemId', 'ChildTwoDisplayName', 'child_2_route'));
        
        $event->addItem($blog);

        $this->activateByRoute(
            $event->getRequest()->get('_route'),
            $event->getItems()
        );
    }

    /**
     * @param string $route
     * @param MenuItemModel[] $items
     */
    protected function activateByRoute($route, $items)
    {
        foreach ($items as $item) {
            if ($item->hasChildren()) {
                $this->activateByRoute($route, $item->getChildren());
            } elseif ($item->getRoute() == $route) {
                $item->setIsActive(true);
            }
        }
    }
}
```

## Translating menu items

You don't have to care about translating your menu items, simply use the translation key instead of the translated string.

The label of each menu item will be automatically displayed by applying the `|trans` filter: 
```twig
{{ item.label|trans }}
```
The default translation domain `messages` will be used (see `templates/includes/menu.html.twig`).

## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
