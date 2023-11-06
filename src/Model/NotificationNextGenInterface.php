<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Model;

interface NotificationNextGenInterface
{
    public function getIdentifier(): string;

    public function getMessage(): string;

    public function getType(): string;

    public function getUrl(): ?string;

    public function isActive(): bool;

    public function isDisabled(): bool;

    public function isWithBadge(): bool;

    public function isBadgeAnimated(): bool;

    public function isHtml(): bool;
}
