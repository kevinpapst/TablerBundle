<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Model;

interface UserInterface
{
    /**
     * The user identifier for generating links.
     *
     * @return string
     */
    public function getIdentifier(): string;

    /**
     * Returns the display name (full name, email or whatever you want to use.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Additional title that can be displayed next to the user.
     *
     * @return string|null
     */
    public function getTitle(): ?string;

    /**
     * URL to the user avatar.
     * Can be something else if you overwrite the avatar component.
     * @return string|null
     */
    public function getAvatar(): ?string;
}
