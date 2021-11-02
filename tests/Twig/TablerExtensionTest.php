<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Tests\Twig;

use KevinPapst\TablerBundle\Twig\TablerExtension;
use PHPUnit\Framework\TestCase;

/**
 * @covers \KevinPapst\TablerBundle\Twig\TablerExtension
 */
class TablerExtensionTest extends TestCase
{
    public function testGetFilters()
    {
        $sut = new TablerExtension();
        $this->assertEquals(4, \count($sut->getFilters()));
        $result = array_map(function ($filter) {
            return $filter->getName();
        }, $sut->getFilters());
        $this->assertEquals(['tabler_container', 'tabler_body', 'tabler_route', 'tabler_icon'], $result);
    }

    public function testGetFunctions()
    {
        $sut = new TablerExtension();
        $this->assertEquals(4, \count($sut->getFunctions()));
        $result = array_map(function ($function) {
            return $function->getName();
        }, $sut->getFunctions());
        $this->assertEquals(['tabler_menu', 'tabler_notifications', 'tabler_user', 'tabler_icon'], $result);
    }
}
