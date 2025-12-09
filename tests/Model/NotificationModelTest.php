<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Tests\Model;

use KevinPapst\TablerBundle\Helper\Constants;
use KevinPapst\TablerBundle\Model\NotificationModel;
use PHPUnit\Framework\TestCase;

/**
 * @covers \KevinPapst\TablerBundle\Model\NotificationModel
 */
class NotificationModelTest extends TestCase
{
    public function testGetIdentifier(): void
    {
        $sut = new NotificationModel('foo', 'bar');
        $this->assertEquals('foo', $sut->getIdentifier());
        $this->assertEquals('bar', $sut->getMessage());

        $this->assertNull($sut->getType());
        $sut->setType(Constants::TYPE_SUCCESS);
        $this->assertEquals(Constants::TYPE_SUCCESS, $sut->getType());
        $sut->setType(null);
        $this->assertNull($sut->getType());

        $this->assertNull($sut->getUrl());
        $sut->setUrl('https://tabler.io');
        $this->assertEquals('https://tabler.io', $sut->getUrl());
        $sut->setUrl(null);
        $this->assertNull($sut->getUrl());

        $sut->setMessage('hello world');
        $this->assertEquals('hello world', $sut->getMessage());
    }
}
