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
    public function testDefaults(): void
    {
        $event = new NotificationEvent();
        $this->assertEquals(0, $event->getTotal());
    }

    public function testTotalsAndReceiveLimitedSet(): void
    {
        $event = new NotificationEvent();
        foreach ($this->generateNbNotifications() as $notification) {
            $event->addNotification($notification);
        }

        $this->assertEquals(7, $event->getTotal());
        $this->assertCount(7, $event->getNotifications());

        $event->setMaxDisplay(3);
        $this->assertCount(3, $event->getNotifications());
    }

    /**
     * Generate an array NotificationModel
     *
     * @return array<int, NotificationModel>
     */
    private function generateNbNotifications(): array
    {
        $arr = [];
        for ($i = 0; $i < 6; $i++) {
            $arr[] = new NotificationModel(
                $i,
                'Message ' . $i,
                array_rand(
                    [
                        Constants::TYPE_INFO,
                        Constants::TYPE_WARNING,
                        Constants::TYPE_ERROR,
                        Constants::TYPE_SUCCESS,
                    ]
                )
            );
        }

        $notificationInvalid = new NotificationModel(8);
        $arr[]               = $notificationInvalid;

        $notificationHTML = new NotificationModel(9);
        $notificationHTML->setHtml('<h1>Test HMTML</h1>');
        $arr[] = $notificationHTML;

        return $arr;
    }
}
