<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Tests\Model;

use KevinPapst\TablerBundle\Model\UserModel;
use PHPUnit\Framework\TestCase;

/**
 * @covers \KevinPapst\TablerBundle\Model\UserModel
 */
class UserModelTest extends TestCase
{
    public function testGetIdentifier()
    {
        $sut = new UserModel('foo', 'bar');
        $this->assertEquals('foo', $sut->getIdentifier());
        $this->assertEquals('bar', $sut->getName());
        $sut->setId('42');
        $this->assertEquals('42', $sut->getIdentifier());
    }
}
