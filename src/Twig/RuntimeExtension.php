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
    private $eventDispatcher;
    private $helper;
    /**
     * @var array<string, string|null>
     */
    private $routes;
    /**
     * @var array<string, string>
     */
    private $icons;

    /**
     * @param EventDispatcherInterface $dispatcher
     * @param ContextHelper $helper
     * @param array<string, string|null> $routes
     * @param array<string, string> $icons
     */
    public function __construct(EventDispatcherInterface $dispatcher, ContextHelper $helper, array $routes, array $icons)
    {
        $this->eventDispatcher = $dispatcher;
        $this->helper = $helper;
        $this->routes = $routes;
        $this->icons = $icons;
    }

    public function getRouteByAlias(string $routeName): string
    {
        // this does not throw an exception on unknown routes, because those could be injected via events!
        return $this->routes[$routeName] ?? $routeName;
    }

    public function bodyClass(string $class = ''): string
    {
        $classList = explode(' ', $class);

        if ($this->helper->isDarkMode()) {
            $classList[] = 'theme-dark';
        }

        return implode(' ', array_values($classList));
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
            return null;
        }

        /** @var NotificationEvent $listEvent */
        $listEvent = $this->eventDispatcher->dispatch(new NotificationEvent());

        if ($listEvent->getTotal() === 0) {
            return null;
        }

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

    public function createIcon(string $name, bool $isButton = true, string $default = null): string
    {
        return '<i class="' . $this->icon($name, $isButton, $default) . '"></i>';
    }

    public function icon(string $name, bool $isButton = true, string $default = null): string
    {
        return ($isButton ? 'icon ' : '') . ($this->icons[str_replace('-', '_', $name)] ?? ($default ?? $name));
    }
}
