<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Event;

use KevinPapst\TablerBundle\Model\NotificationV2Interface;
use KevinPapst\TablerBundle\Model\NotificationInterface;

class NotificationEvent extends ThemeEvent
{
    private ?string $title = null;

    private ?string $titleEmpty = null;

    private ?string $titleHtml = null;

    private bool $withArrow = true;

    private string $badgeColor = 'red';

    private bool $showBadgeTotal = true;

    private int $maxDisplay = 10;

    /**
     * @var $notifications array<int,NotificationInterface | NotificationV2Interface>
     */
    private array $notifications = [];

    public function getTotal(): int
    {
        return \count($this->getNotifications(null));
    }

    public function isVisible(): bool
    {
        return $this->getTotal() > 0 || ($this->getTotal() === 0 && $this->showIfEmpty);
    }

    public function __construct(
        private bool $showIfEmpty = false,
    ) {
    }

    public function isShowIfEmpty(): bool
    {
        return $this->showIfEmpty;
    }

    public function setShowIfEmpty(bool $showIfEmpty): void
    {
        $this->showIfEmpty = $showIfEmpty;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getTitleEmpty(): ?string
    {
        return $this->titleEmpty;
    }

    public function setTitleEmpty(?string $titleEmpty): void
    {
        $this->titleEmpty = $titleEmpty;
    }

    public function getTitleHtml(): ?string
    {
        return $this->titleHtml;
    }

    public function setTitleHtml(?string $titleHtml): void
    {
        $this->titleHtml = $titleHtml;
    }

    public function isWithArrow(): bool
    {
        return $this->withArrow;
    }

    public function setWithArrow(bool $withArrow): void
    {
        $this->withArrow = $withArrow;
    }

    public function getBadgeColor(): string
    {
        return $this->badgeColor;
    }

    public function setBadgeColor(string $badgeColor): void
    {
        $this->badgeColor = $badgeColor;
    }

    public function isShowBadgeTotal(): bool
    {
        return $this->showBadgeTotal;
    }

    public function setShowBadgeTotal(bool $showBadgeTotal): void
    {
        $this->showBadgeTotal = $showBadgeTotal;
    }

    public function getMaxDisplay(): int
    {
        return $this->maxDisplay;
    }

    public function setMaxDisplay(int $maxDisplay): void
    {
        $this->maxDisplay = $maxDisplay;
    }

    /**
     * @return array<int,NotificationInterface | NotificationV2Interface>
     */
    public function getNotifications(?int $max = 10): array
    {
        if ($max === null) {
            return $this->notifications;
        } elseif ($max !== 10) {
            trigger_deprecation('kevinpapst/tabler-bundle', '1.1.0', 'Setting `$max` parameter is deprecated. Use setMaxDisplay() instead!');
        }

        return \array_slice($this->notifications, 0, $this->maxDisplay);
    }

    public function addNotification(NotificationV2Interface|NotificationInterface $notification): void
    {
//        if (($notification instanceof NotificationV2Interface) === false) {
//            trigger_deprecation('kevinpapst/tabler-bundle', '1.2.0', 'Notification should implement NotificationV2Interface::class!');
//        }

        $this->notifications[] = $notification;
    }

    public function removeNotification(NotificationInterface $notification): void
    {
        if (($key = array_search($notification, $this->notifications)) !== false) {
            unset($this->notifications[$key]);
        }
    }
}
