<?php

namespace KevinPapst\TablerBundle\Event;

use KevinPapst\TablerBundle\Model\NotificationInterface;
use KevinPapst\TablerBundle\Model\NotificationV2Interface;

interface NotificationEventInterface
{
    public function getTotal(): int;

    public function isVisible(): bool;

    public function isShowIfEmpty(): bool;

    public function getTitle(): ?string;

    public function getTitleEmpty(): ?string;

    public function getTitleHtml(): ?string;

    public function isWithArrow(): bool;

    public function getBadgeColor(): string;

    public function isShowBadgeTotal(): bool;

    public function getMaxDisplay(): int;

    /**
     * @return array<int,NotificationInterface | NotificationV2Interface>
     */
    public function getNotifications(?int $max = 10): array;
}
