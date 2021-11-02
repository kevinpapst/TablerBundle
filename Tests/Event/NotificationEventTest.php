<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Tests\Event;

use KevinPapst\TablerBundle\Event\NotificationEvent;
use KevinPapst\TablerBundle\Helper\Constants;
use KevinPapst\TablerBundle\Model\NotificationModel;
use PHPUnit\Framework\TestCase;

/**
 * @covers \KevinPapst\TablerBundle\Event\NotificationEvent
 */
class NotificationEventTest extends TestCase
{
    public function testDefaults()
    {
        $event = new NotificationEvent();
        $this->assertEquals(0, $event->getTotal());
    }

    public function testTotalsAndReceiveLimitedSet()
    {
        $event = new NotificationEvent();
        $notifications = $this->generateNbNotifications(7);

        foreach ($notifications as $notification) {
            $event->addNotification($notification);
        }

        $this->assertEquals(7, $event->getTotal());
        $this->assertEquals(7, \count($event->getNotifications()));
        $this->assertEquals(3, \count($event->getNotifications(3)));
    }

    /**
     * Generate an array of nb tasks
     * @param int $number
     * @param string $type
     * @return array|NotificationModel[]
     */
    private function generateNbNotifications($number, $type = Constants::TYPE_INFO)
    {
        $tasks = [];
        for ($i = 0; $i < $number; $i++) {
            $tasks[] = new NotificationModel(
                'Message ' . $i,
                $type
            );
        }

        return $tasks;
    }
}
