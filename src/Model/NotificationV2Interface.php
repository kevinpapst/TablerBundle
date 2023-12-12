<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Model;

/**
 * TODO : Implement these in NotificationInterface later
 * @internal THIS WILL BE REMOVED WITH THE NEXT MAJOR RELEASE, NO BC PROMISE GIVEN
 * @deprecated
 */
interface NotificationV2Interface extends NotificationInterface
{
    public function isActive(): bool;

    public function isDisabled(): bool;

    public function isWithBadge(): bool;

    public function isBadgeAnimated(): bool;

    public function isHtml(): bool;
}
