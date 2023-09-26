<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Model;

class MenuItemModel implements MenuItemInterface
{
    private string $identifier;
    private string $label;
    private ?string $route;
    /** @var array<string, mixed> */
    private array $routeArgs;
    private ?string $icon;
    /** @var array<MenuItemInterface> */
    private array $children = [];
    private ?MenuItemInterface $parent = null;
    private ?string $badge = null;
    private ?string $badgeColor = null;
    private bool $isActive = false;
    private bool $divider = false;
    private bool $expanded = false;
    private string $translationDomain = 'messages';

    /**
     * @param array<string, mixed> $routeArgs
     */
    public function __construct(
        string $identifier,
        string $label,
        ?string $route = null,
        array $routeArgs = [],
        ?string $icon = null
    ) {
        $this->identifier = $identifier;
        $this->label = $label;
        $this->route = $route;
        $this->routeArgs = $routeArgs;
        $this->icon = $icon;
    }

    /**
     * @return array<MenuItemInterface>
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * @param array<MenuItemInterface> $children
     */
    public function setChildren(array $children): void
    {
        $this->children = $children;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): void
    {
        $this->icon = $icon;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function getIsActive(): bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): void
    {
        $this->parent?->setIsActive($isActive);

        $this->isActive = $isActive;
    }

    public function hasParent(): bool
    {
        return $this->parent !== null;
    }

    public function getParent(): ?MenuItemInterface
    {
        return $this->parent;
    }

    public function setParent(MenuItemInterface $parent): void
    {
        $this->parent = $parent;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    public function getRoute(): ?string
    {
        return $this->route;
    }

    public function setRoute(?string $route): void
    {
        $this->route = $route;
    }

    public function getRouteArgs(): array
    {
        return $this->routeArgs;
    }

    /**
     * @param array<string, mixed> $routeArgs
     */
    public function setRouteArgs(array $routeArgs): void
    {
        $this->routeArgs = $routeArgs;
    }

    public function hasChildren(): bool
    {
        return \count($this->children) > 0;
    }

    public function addChild(MenuItemInterface $child): void
    {
        $child->setParent($this);
        $this->children[] = $child;
    }

    public function removeChild(MenuItemInterface $child): void
    {
        if (false !== ($key = array_search($child, $this->children))) {
            unset($this->children[$key]);
        }
    }

    public function getActiveChild(): ?MenuItemInterface
    {
        foreach ($this->children as $child) {
            if ($child->isActive()) {
                return $child;
            }
        }

        return null;
    }

    public function hasActiveChild(): bool
    {
        return null !== $this->getActiveChild();
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function setBadge(?string $badge): void
    {
        $this->badge = $badge;
    }

    public function setBadgeColor(?string $badgeColor): void
    {
        $this->badgeColor = $badgeColor;
    }

    public function getBadge(): ?string
    {
        return $this->badge;
    }

    public function getBadgeColor(): ?string
    {
        return $this->badgeColor;
    }

    public function isDivider(): bool
    {
        return $this->divider;
    }

    public function setDivider(bool $divider): void
    {
        $this->divider = $divider;
    }

    public function isExpanded(): bool
    {
        return $this->expanded;
    }

    /**
     * Allows to manually expand menus in vertical navigation.
     *
     * @param bool $expanded
     * @return void
     */
    public function setExpanded(bool $expanded): void
    {
        $this->expanded = $expanded;
    }

    public function getTranslationDomain(): string
    {
        return $this->translationDomain;
    }

    public function setTranslationDomain(string $translationDomain): void
    {
        $this->translationDomain = $translationDomain;
    }
}
