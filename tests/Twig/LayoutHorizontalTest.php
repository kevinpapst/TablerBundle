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
use KevinPapst\TablerBundle\Twig\TablerExtension;
use PHPUnit\Framework\TestCase;
use Symfony\Bridge\Twig\Extension\AssetExtension;
use Symfony\Component\Asset\Packages;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\RequestStack;
use Twig\Environment;
use Twig\Loader\ArrayLoader;
use Twig\Loader\ChainLoader;
use Twig\Loader\FilesystemLoader;
use Twig\RuntimeLoader\FactoryRuntimeLoader;

class LayoutHorizontalTest extends TestCase
{
    /**
     * @return iterable<string, array{array<string, bool>, bool}>
     */
    public static function getPageHeaderData(): iterable
    {
        yield 'default' => [[], false];
        // the page header sits on the light page body
        yield 'dark header' => [['header_dark' => true], false];
        // the page header sits on the dark band the navbar draws below itself
        yield 'overlapping navbar' => [['navbar_overlap' => true], true];
        yield 'overlapping dark header' => [['header_dark' => true, 'navbar_overlap' => true], true];
    }

    /**
     * @dataProvider getPageHeaderData
     * @param array<string, bool> $options
     */
    public function testPageHeaderIsWhiteOnAnOverlappingNavbar(array $options, bool $isWhite): void
    {
        $classes = $this->getPageHeaderClasses($options, '@Tabler/layout_horizontal.html.twig');

        self::assertSame($isWhite, \in_array('text-white', $classes, true));
    }

    public function testPageHeaderClassBlockKeepsTheWhiteText(): void
    {
        $classes = $this->getPageHeaderClasses(['navbar_overlap' => true], 'page.html.twig');

        self::assertContains('text-white', $classes);
        self::assertContains('my-header', $classes);
    }

    /**
     * @param array<string, bool> $options
     * @return list<string>
     */
    private function getPageHeaderClasses(array $options, string $template): array
    {
        $contextHelper = new ContextHelper();
        foreach ($options as $key => $value) {
            $contextHelper->setOption($key, $value);
        }

        $filesystemLoader = new FilesystemLoader();
        $filesystemLoader->addPath(__DIR__ . '/../../templates', 'Tabler');

        $twig = new Environment(new ChainLoader([
            new ArrayLoader([
                'page.html.twig' => "{% extends '@Tabler/layout_horizontal.html.twig' %}{% block page_header_class %}my-header{% endblock %}",
            ]),
            $filesystemLoader,
        ]));
        // the layout calls asset() outside of the page header, but Twig compiles the whole template
        $twig->addExtension(new AssetExtension(new Packages()));
        $twig->addExtension(new TablerExtension());
        $twig->addRuntimeLoader(new FactoryRuntimeLoader([
            RuntimeExtension::class => static fn () => new RuntimeExtension(new RequestStack(), new EventDispatcher(), $contextHelper, [], []),
        ]));
        $twig->addGlobal('tabler_bundle', $contextHelper);

        $html = $twig->load($template)->renderBlock('page_header');

        if (1 !== preg_match('/class="(page-header [^"]*)"/', $html, $matches)) {
            self::fail('No page header in: ' . $html);
        }

        return array_values(array_filter(explode(' ', $matches[1])));
    }
}
