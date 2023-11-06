<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Model;

use KevinPapst\TablerBundle\Helper\Constants;

class NotificationModel implements NotificationInterface
{
    // Simple link
    private ?string $url           = null;
    private bool    $active        = false;
    private bool    $disabled      = false;
    private bool    $withBadge     = true;
    private bool    $badgeAnimated = true;

    // Custom HTML
    private ?string $html = null;

    public function isValid(): bool
    {
        return $this->message || $this->html;
    }

    public function __construct(
        private readonly string $id,
        private ?string $message = null,
        private ?string $type = Constants::TYPE_INFO
    ) {
    }

    public function getIdentifier(): string
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function isDisabled(): bool
    {
        return $this->disabled;
    }

    public function setDisabled(bool $disabled): self
    {
        $this->disabled = $disabled;

        return $this;
    }

    public function isWithBadge(): bool
    {
        return $this->withBadge;
    }

    public function setWithBadge(bool $withBadge): self
    {
        $this->withBadge = $withBadge;

        return $this;
    }

    public function isBadgeAnimated(): bool
    {
        return $this->badgeAnimated;
    }

    public function setBadgeAnimated(bool $badgeAnimated): self
    {
        $this->badgeAnimated = $badgeAnimated;

        return $this;
    }

    public function getHtml(): ?string
    {
        return $this->html;
    }

    public function setHtml(?string $html): self
    {
        $this->html = $html;

        return $this;
    }
}
