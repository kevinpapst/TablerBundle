<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Tests\Twig;

use KevinPapst\TablerBundle\Twig\IconExtension;
use PHPUnit\Framework\TestCase;
use Symfony\UX\Icons\IconRegistryInterface;
use Symfony\UX\Icons\IconRenderer;

/**
 * @covers \KevinPapst\TablerBundle\Twig\IconExtension
 */
class IconExtensionTest extends TestCase
{
    private function getSut(): IconExtension
    {
        $icons = [
            'foo' => 'fas fa-times',
            'mail' => 'fas fa-envelope',
        ];

        $renderer = new IconRenderer($this->createMock(IconRegistryInterface::class), []);

        return new IconExtension($renderer, $icons);
    }

    public function testIcon(): void
    {
        $sut = $this->getSut();
        $this->assertEquals('test', $sut->icon('test'));
    }

    public function testCreateIcon(): void
    {
        $sut = $this->getSut();
        $this->assertEquals('<i class="icon fas fa-times"></i>', $sut->createIcon('foo', true, 'bar'));
    }

    public function testCreateIconWithDefault(): void
    {
        $sut = $this->getSut();
        $this->assertEquals('<i class="bar"></i>', $sut->createIcon('foo2', false, 'bar'));
    }
}
