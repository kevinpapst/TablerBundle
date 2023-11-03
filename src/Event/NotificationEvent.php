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
    public ?string $title = null;

    public ?string $emptyTitle = null;

    public bool $withArrow = true;

    public string $badgeColor = 'red';

    public bool $showBadgeTotal = true;

    private array $notifications = [];

    public int $maxDisplay = 10;

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
            trigger_deprecation('kevinpapst/tabler-bundle', '1.1.0', 'Using $max is this function is deprecated. Set $maxDisplay inside the event instead!');
        }

        return \array_slice($notifications, 0, $this->maxDisplay);
    }

    public function addNotification(NotificationInterface $notificationInterface): void
    {
        $this->notifications[] = $notificationInterface;
    }

    public function getTotal(): int
    {
        return \count($this->getNotifications(null));
    }
}
