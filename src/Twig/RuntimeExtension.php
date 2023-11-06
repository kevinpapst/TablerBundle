<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Twig;

use KevinPapst\TablerBundle\Event\MenuEvent;
use KevinPapst\TablerBundle\Event\NotificationEvent;
use KevinPapst\TablerBundle\Event\UserDetailsEvent;
use KevinPapst\TablerBundle\Helper\ContextHelper;
use KevinPapst\TablerBundle\Model\MenuItemInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Twig\Extension\RuntimeExtensionInterface;

final class RuntimeExtension implements RuntimeExtensionInterface
{
    /**
     * @param array<string, string|null> $routes
     * @param array<string, string> $icons
     */
    public function __construct(private EventDispatcherInterface $eventDispatcher, private ContextHelper $helper, private array $routes, private array $icons)
    {
    }

    public function getRouteByAlias(string $routeName): string
    {
        // this does not throw an exception on unknown routes, because those could be injected via events!
        return $this->routes[$routeName] ?? $routeName;
    }

    public function bodyClass(string $class = ''): string
    {
        return $class;
    }

    public function theme(): string
    {
        if ($this->helper->isDarkMode()) {
            return 'dark';
        }

        return 'light';
    }

    public function assetVersion(): string
    {
        return $this->helper->getAssetVersion();
    }

    public function containerClass(string $class = ''): string
    {
        $classList = explode(' ', $class);

        if ($this->helper->isBoxedLayout()) {
            $classList[] = 'container-xl';
        } else {
            $classList[] = 'container-fluid';
        }

        return trim(implode(' ', array_values($classList)));
    }

    /**
     * @param Request $request
     * @return MenuItemInterface[]|null
     */
    public function getMenu(Request $request): ?array
    {
        if (!$this->eventDispatcher->hasListeners(MenuEvent::class)) {
            return null;
        }

        /** @var MenuEvent $event */
        $event = $this->eventDispatcher->dispatch(new MenuEvent($request));

        return $event->getItems();
    }

    public function getNotifications(): ?NotificationEvent
    {
        if (!$this->eventDispatcher->hasListeners(NotificationEvent::class)) {
            return new NotificationEvent();
        }

        /** @var NotificationEvent $listEvent */
        $listEvent = $this->eventDispatcher->dispatch(new NotificationEvent());

        return $listEvent;
    }

    public function getUserDetails(): ?UserDetailsEvent
    {
        if (!$this->eventDispatcher->hasListeners(UserDetailsEvent::class)) {
            return null;
        }

        /** @var UserDetailsEvent $userEvent */
        $userEvent = $this->eventDispatcher->dispatch(new UserDetailsEvent());

        if ($userEvent->getUser() === null) {
            return null;
        }

        return $userEvent;
    }

    public function createIcon(string $name, bool $withIconClass = false, string $default = null): string
    {
        return '<i class="' . $this->icon($name, $withIconClass, $default) . '"></i>';
    }

    public function icon(string $name, bool $withIconClass = false, string $default = null): string
    {
        return ($withIconClass ? 'icon ' : '') . ($this->icons[str_replace('-', '_', $name)] ?? ($default ?? $name));
    }

    public function uniqueId(string $prefix = '', bool $more_entropy = false): string
    {
        return uniqid($prefix, $more_entropy);
    }
}
