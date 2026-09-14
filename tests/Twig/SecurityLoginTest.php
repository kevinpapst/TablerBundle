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
use Symfony\Bridge\Twig\Extension\TranslationExtension;
use Symfony\Component\Asset\Packages;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Translation\Translator;
use Twig\Environment;
use Twig\Loader\ArrayLoader;
use Twig\Loader\ChainLoader;
use Twig\Loader\FilesystemLoader;
use Twig\RuntimeLoader\FactoryRuntimeLoader;
use Twig\TwigFunction;

class SecurityLoginTest extends TestCase
{
    public function testUsernameStaysATextInputByDefault(): void
    {
        $html = $this->renderLoginForm('@Tabler/security.html.twig');

        self::assertStringContainsString('name="_username"', $html);
        self::assertStringContainsString('type="text"', $html);
    }

    public function testUsernameBlockCanBeOverridden(): void
    {
        $html = $this->renderLoginForm('username.html.twig');

        self::assertStringContainsString('name="_email"', $html);
        self::assertStringNotContainsString('name="_username"', $html);
        // the rest of the form is untouched
        self::assertStringContainsString('name="_password"', $html);
    }

    public function testPasswordBlockCanBeOverridden(): void
    {
        $html = $this->renderLoginForm('password.html.twig');

        self::assertStringContainsString('name="_secret"', $html);
        self::assertStringNotContainsString('name="_password"', $html);
        self::assertStringContainsString('name="_username"', $html);
    }

    private function renderLoginForm(string $template): string
    {
        $filesystemLoader = new FilesystemLoader();
        $filesystemLoader->addPath(__DIR__ . '/../../templates', 'Tabler');

        $twig = new Environment(new ChainLoader([
            new ArrayLoader([
                'username.html.twig' => "{% extends '@Tabler/security.html.twig' %}"
                    . '{% block login_username %}<input name="_email" type="email">{% endblock %}',
                'password.html.twig' => "{% extends '@Tabler/security.html.twig' %}"
                    . '{% block login_password %}<input name="_secret" type="password">{% endblock %}',
            ]),
            $filesystemLoader,
        ]));

        $twig->addExtension(new AssetExtension(new Packages()));
        $twig->addExtension(new TranslationExtension(new Translator('en')));
        $twig->addExtension(new TablerExtension());
        $twig->addRuntimeLoader(new FactoryRuntimeLoader([
            RuntimeExtension::class => static fn () => new RuntimeExtension(new RequestStack(), new EventDispatcher(), new ContextHelper(), [], []),
        ]));
        $twig->addGlobal('tabler_bundle', new ContextHelper());
        // the login form posts to a route and carries a token, neither of which this test asserts on
        $twig->addFunction(new TwigFunction('path', static fn (string $route) => '/' . $route));
        $twig->addFunction(new TwigFunction('csrf_token', static fn (string $id) => $id));

        return $twig->load($template)->renderBlock('login_form');
    }
}
