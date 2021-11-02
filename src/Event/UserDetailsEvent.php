<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Event;

use KevinPapst\TablerBundle\Model\MenuItemInterface;
use KevinPapst\TablerBundle\Model\UserInterface;

/**
 * Collect the UserInterface object that should be rendered in the user section.
 */
class UserDetailsEvent extends ThemeEvent
{
    /**
     * @var UserInterface
     */
    private $user;
    /**
     * @var MenuItemInterface[]
     */
    private $links = [];
    private $showLogoutLink = true;

    public function setUser(UserInterface $user): void
    {
        $this->user = $user;
    }

    public function getUser(): ?UserInterface
    {
        return $this->user;
    }

    /**
     * @return MenuItemInterface[]
     */
    public function getLinks(): array
    {
        return $this->links;
    }

    public function addLink(MenuItemInterface $link): void
    {
        $this->links[] = $link;
    }

    public function isShowLogoutLink(): bool
    {
        return $this->showLogoutLink;
    }

    public function setShowLogoutLink(bool $showLogoutLink): void
    {
        $this->showLogoutLink = $showLogoutLink;
    }
}
