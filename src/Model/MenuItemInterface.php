<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Model;

interface MenuItemInterface
{
    public function isExpanded(): bool;

    public function getIdentifier(): string;

    public function getLabel(): ?string;

    public function getTranslationDomain(): string;

    public function getRoute(): ?string;

    public function getRouteArgs(): array;

    public function getIcon(): ?string;

    /**
     * @return array<MenuItemInterface>
     */
    public function getChildren(): array;

    public function hasChildren(): bool;

    public function addChild(MenuItemInterface $child): void;

    public function removeChild(MenuItemInterface $child): void;

    public function getParent(): ?MenuItemInterface;

    public function hasParent(): bool;

    public function setParent(MenuItemInterface $parent): void;

    public function isActive(): bool;

    public function setIsActive(bool $isActive): void;

    public function getActiveChild(): ?MenuItemInterface;

    public function getBadge(): ?string;

    public function getBadgeColor(): ?string;

    public function isDivider(): bool;
}
