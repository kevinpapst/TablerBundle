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
     * @deprecated will be renamed to getUserIdentifier() once we raise the minimum SF version to 5
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
     * UReturns the URL to the user avatar or null if none is available.
     *
     * You can change the avatar behaviour and return any other string,
     * you just need to overwrite the avatar component at templates/components/avatar_image.html.twig
     *
     * @return string|null
     */
    public function getAvatar(): ?string;
}
