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
    /**
     * @var array<NotificationInterface>
     */
    private array $notifications = [];

    /**
     * @param int|null $max
     * @return NotificationInterface[]
     */
    public function getNotifications(?int $max = 10): array
    {
        if (null !== $max) {
            return \array_slice($this->notifications, 0, $max);
        }

        return $this->notifications;
    }

    public function addNotification(NotificationInterface $notificationInterface): void
    {
        $this->notifications[] = $notificationInterface;
    }

    public function getTotal(): int
    {
        return \count($this->notifications);
    }
}
