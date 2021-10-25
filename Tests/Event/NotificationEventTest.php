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

class NotificationEventTest extends TestCase
{
    /**
     * @test
     */
    public function total_should_be_zero_and_max_null_when_there_are_no_notification()
    {
        $event = new NotificationEvent();
        $this->assertEquals(0, $event->getTotal());
    }

    /**
     * @test
     */
    public function total_should_be_equal_the_number_of_notifications_if_max_is_greater_then_the_number_of_notifications()
    {
        $event = new NotificationEvent();
        $notifications = $this->generateNbNotifications(7);

        foreach ($notifications as $notification) {
            $event->addNotification($notification);
        }

        $this->assertEquals(7, $event->getTotal());
        $this->assertEquals(7, \count($event->getNotifications()));
    }

    /**
     * @test
     */
    public function total_should_equal_the_number_of_notifications_and_count_notifications_should_equal_max_when_max_is_lower_then_the_number_of_notifications()
    {
        $event = new NotificationEvent();
        $notifications = $this->generateNbNotifications(7);

        foreach ($notifications as $notification) {
            $event->addNotification($notification);
        }

        $this->assertEquals(7, $event->getTotal());
        $this->assertEquals(5, \count($event->getNotifications(5)));
    }

    /**
     * @test
     */
    public function total_equal_the_number_of_notifications_when_max_is_null()
    {
        $event = new NotificationEvent();
        $notifications = $this->generateNbNotifications(7);

        foreach ($notifications as $notification) {
            $event->addNotification($notification);
        }

        $this->assertEquals(7, $event->getTotal());
        $this->assertEquals(7, \count($event->getNotifications()));
    }

    /**
     * @test
     */
    public function you_can_set_total_to_be_different_from_the_number_of_notifications()
    {
        $event = new NotificationEvent();
        $notifications = $this->generateNbNotifications(7);

        foreach ($notifications as $notification) {
            $event->addNotification($notification);
        }

        $this->assertEquals(7, $event->getTotal());
        $this->assertEquals(7, \count($event->getNotifications()));
    }

    /**
     * @test
     */
    public function you_can_set_total_to_be_different_from_the_number_of_notifications_and_set_max_to_another_value()
    {
        $event = new NotificationEvent();
        $notifications = $this->generateNbNotifications(7);

        foreach ($notifications as $notification) {
            $event->addNotification($notification);
        }

        $this->assertEquals(7, $event->getTotal());
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
