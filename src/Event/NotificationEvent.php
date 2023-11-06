<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Event;

use KevinPapst\TablerBundle\Model\NotificationInterface;

class NotificationEvent extends ThemeEvent
{
    private ?string $title = null;

    private ?string $emptyTitle = null;

    private bool $withArrow = true;

    private string $badgeColor = 'red';

    private bool $showBadgeTotal = true;

    private int $maxDisplay = 10;

    /**
     * @var $notifications array<int,NotificationInterface>
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

    public function getEmptyTitle(): ?string
    {
        return $this->emptyTitle;
    }

    public function setEmptyTitle(?string $emptyTitle): void
    {
        $this->emptyTitle = $emptyTitle;
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
     * @return array<int,NotificationInterface>
     */
    public function getNotifications(?int $max = 10): array
    {
        $notifications = array_filter(
            $this->notifications,
            fn(NotificationInterface $notification) => $notification->isValid()
        );

        if ($max === null) {
            return $notifications;
        } elseif ($max !== 10) {
            trigger_deprecation('kevinpapst/tabler-bundle', '1.1.0', 'Setting `$max` parameter is deprecated. Use setMaxDisplay() instead!');
        }

        return \array_slice($notifications, 0, $this->maxDisplay);
    }

    public function addNotification(NotificationInterface $notification): void
    {
        $this->notifications[] = $notification;
    }

    public function removeNotification(NotificationInterface $notification): void
    {
        if (($key = array_search($notification, $this->notifications)) !== false) {
            unset($this->notifications[$key]);
        }
    }
}
