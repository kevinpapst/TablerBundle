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
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * @covers \KevinPapst\TablerBundle\Twig\RuntimeExtension
 */
class RuntimeExtensionTest extends TestCase
{
    /**
     * @param array<string, mixed> $options
     * @return RuntimeExtension
     */
    private function getSut(array $options): RuntimeExtension
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
        $requestStack = new RequestStack();

        return new RuntimeExtension($requestStack, $dispatcher, $contextHelper, $routes, $icons);
    }

    public function testGetRouteByAlias(): void
    {
        $sut = $this->getSut([]);
        $this->assertEquals('bar', $sut->getRouteByAlias('foo'));
        $this->assertEquals('hello', $sut->getRouteByAlias('hello'));
        // unknown routes will be returned as given
        $this->assertEquals('unknown-route', $sut->getRouteByAlias('unknown-route'));
    }

    public function testBodyClass(): void
    {
        $sut = $this->getSut([]);
        $this->assertEquals('test', $sut->bodyClass('test'));

        $sut = $this->getSut(['dark_mode' => true]);
        $this->assertEquals('test', $sut->bodyClass('test'));
    }

    public function testTheme(): void
    {
        $sut = $this->getSut([]);
        $this->assertEquals('light', $sut->theme());

        $sut = $this->getSut(['dark_mode' => true]);
        $this->assertEquals('dark', $sut->theme());
    }
}
