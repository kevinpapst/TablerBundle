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

        $notifications = $this->generateNbNotifications();
        foreach ($notifications as $notification) {
            $event->addNotification($notification);
        }

        $this->assertEquals(\count($notifications), $event->getTotal());
        $this->assertCount(\count($notifications), $event->getNotifications());

        $event->setMaxDisplay(7);
        $this->assertEquals(\count($notifications), $event->getTotal());
        $this->assertCount(7, $event->getNotifications());
    }

    public function testVisible(): void
    {
        $event = new NotificationEvent();
        // Should be hidden by default
        $this->assertFalse($event->isVisible());

        $event->addNotification(new NotificationModel('visible', 'Message'));
        // Even with a single valid item, should be visible
        $this->assertTrue($event->isVisible());

        $event = new NotificationEvent(true);
        // Forced to always visible
        $this->assertTrue($event->isVisible());
    }

    /**
     * Generate an array NotificationModel
     *
     * @return array<int, NotificationModel>
     */
    private function generateNbNotifications(): array
    {
        $arr = [];

        // 1
        $activeNotification = new NotificationModel('active', 'My active Message', Constants::TYPE_WARNING);
        $activeNotification->setActive(true);
        $arr[] = $activeNotification;

        // 2
        $defaultNotification = new NotificationModel('default', 'My default Message');
        $arr[]               = $defaultNotification;

        // 3
        $disabledNotification = new NotificationModel('disabled', 'My disabled Message', null);
        $disabledNotification->setDisabled(true);
        $disabledNotification->setBadgeAnimated(false);
        $arr[] = $disabledNotification;

        // 4
        $customizeNotification = new NotificationModel('customize', 'Link to Google', Constants::TYPE_SUCCESS);
        $customizeNotification->setBadgeAnimated(false);
        $customizeNotification->setUrl('https://www.google.com');
        $arr[] = $customizeNotification;

        // 5
        $htmlNotification = new NotificationModel('html', '
            <div class="list-group-item">
                <div class="row align-items-center">
                  <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                  <div class="col text-truncate">
                    <a href="#" class="text-body d-block">Example 1</a>
                    <div class="d-block text-muted text-truncate mt-n1">
                      Change deprecated html tags to text decoration classes (#29604)
                    </div>
                  </div>
                  <div class="col-auto">
                    <a href="#" class="list-group-item-actions">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path></svg>
                    </a>
                  </div>
                </div>
            </div>
        ');
        $htmlNotification->setHtml(true);
        $arr[] = $htmlNotification;

        // 6
        $badgeNotification = new NotificationModel('badge', '
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Notification with badge
                <span class="badge badge-primary badge-pill">14</span>
            </li>
        ');
        $badgeNotification->setHtml(true);
        $arr[] = $badgeNotification;

        // 7
        $flexBoxNotification = new NotificationModel('flexbox', '
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">List group item heading</h5>
                  <small>3 days ago</small>
                </div>
                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                <small>Donec id elit non mi porta.</small>
            </a>
        ');
        $flexBoxNotification->setHtml(true);
        $arr[] = $flexBoxNotification;

        // 8
        $moreThanMaxNotification =
            new NotificationModel('max', 'Will not be displayed as max notification is set to 7');
        $arr[]                   = $moreThanMaxNotification;

        // 9
        $extraNotification = new NotificationModel('extra', 'One more not displayed');
        $arr[]             = $extraNotification;

        return $arr;
    }
}
