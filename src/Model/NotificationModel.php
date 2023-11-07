<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Model;

use KevinPapst\TablerBundle\Helper\Constants;

class NotificationModel implements NotificationNextGenInterface
{
    private ?string $url           = null;
    private bool    $active        = false;
    private bool    $disabled      = false;
    private bool    $withBadge     = true;
    private bool    $badgeAnimated = true;

    private bool $html = false;

    public function __construct(
        private readonly string $id,
        private string $message,
        private string $type = Constants::TYPE_INFO
    ) {
    }

    public function getIdentifier(): string
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function isDisabled(): bool
    {
        return $this->disabled;
    }

    public function setDisabled(bool $disabled): void
    {
        $this->disabled = $disabled;
    }

    public function isWithBadge(): bool
    {
        return $this->withBadge;
    }

    public function setWithBadge(bool $withBadge): void
    {
        $this->withBadge = $withBadge;
    }

    public function isBadgeAnimated(): bool
    {
        return $this->badgeAnimated;
    }

    public function setBadgeAnimated(bool $badgeAnimated): void
    {
        $this->badgeAnimated = $badgeAnimated;
    }

    public function isHtml(): bool
    {
        return $this->html;
    }

    public function setHtml(bool $html): void
    {
        $this->html = $html;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }
}
