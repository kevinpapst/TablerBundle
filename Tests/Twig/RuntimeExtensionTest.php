<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Tests\Twig;

use KevinPapst\TablerBundle\Helper\ContextHelper;
use KevinPapst\TablerBundle\Twig\RuntimeExtension;
use PHPUnit\Framework\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * @covers \KevinPapst\TablerBundle\Twig\RuntimeExtension
 */
class RuntimeExtensionTest extends TestCase
{
    private function getSut(array $options = []): RuntimeExtension
    {
        $contextHelper = new ContextHelper();
        foreach ($options as $key => $value) {
            $contextHelper->setOption($key, $value);
        }

        $routes = [
            'foo' => 'bar',
            'hello' => null,
        ];

        $icons = [
            'foo' => 'fas fa-times',
            'mail' => 'fas fa-envelope',
        ];

        $dispatcher = new EventDispatcher();

        return new RuntimeExtension($dispatcher, $contextHelper, $routes, $icons);
    }

    public function testGetRouteByAlias()
    {
        $sut = $this->getSut();
        $this->assertEquals('bar', $sut->getRouteByAlias('foo'));
        $this->assertEquals('hello', $sut->getRouteByAlias('hello'));
    }

    public function testGetRouteByAliasThrowsForNotExistingRoute()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Unknown route alias: test1');

        $sut = $this->getSut();
        $this->assertEquals('test1', $sut->getRouteByAlias('test1'));
    }

    public function testBodyClass()
    {
        $sut = $this->getSut([]);
        $this->assertEquals('test', $sut->bodyClass('test'));

        $sut = $this->getSut(['dark_mode' => true]);
        $this->assertEquals('test theme-dark', $sut->bodyClass('test'));
    }
}
