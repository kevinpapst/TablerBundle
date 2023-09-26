<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Event;

use KevinPapst\TablerBundle\Model\MenuItemInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Collect all MenuItemInterface objects that should be rendered in the menu section.
 */
class MenuEvent extends ThemeEvent
{
    /**
     * @var MenuItemInterface[]
     */
    private array $menuRootItems = [];

    public function __construct(private Request $request)
    {
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @return MenuItemInterface[]
     */
    public function getItems(): array
    {
        return $this->menuRootItems;
    }

    public function addItem(MenuItemInterface $item): MenuEvent
    {
        $this->menuRootItems[$item->getIdentifier()] = $item;

        return $this;
    }

    /**
     * @param MenuItemInterface|string $item
     * @return MenuEvent
     */
    public function removeItem($item): MenuEvent
    {
        /** @phpstan-ignore-next-line */
        $id = $item instanceof MenuItemInterface ? $item->getIdentifier() : (\is_string($item) ? $item : null);

        if (\array_key_exists($id, $this->menuRootItems)) {
            unset($this->menuRootItems[$id]);
        }

        return $this;
    }

    public function getRootItem(string $id): ?MenuItemInterface
    {
        return $this->menuRootItems[$id] ?? null;
    }

    public function getActive(): ?MenuItemInterface
    {
        foreach ($this->getItems() as $item) {
            if ($item->isActive()) {
                return $item;
            }
        }

        return null;
    }
}
