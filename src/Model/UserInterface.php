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
     */
    public function getUserIdentifier(): string;

    /**
     * Returns the display name (full name, email or whatever you want to use.
     */
    public function getName(): string;

    /**
     * Additional title that can be displayed next to the user.
     */
    public function getTitle(): ?string;

    /**
     * Returns the URL to the user avatar or null if none is available.
     *
     * You can change the avatar behaviour and return any other string, you just need
     * to overwrite the avatar component at templates/components/avatar_image.html.twig.
     */
    public function getAvatar(): ?string;
}
