<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Tests\DependencyInjection;

use KevinPapst\TablerBundle\DependencyInjection\Configuration;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Definition\Processor;

/**
 * @covers \KevinPapst\TablerBundle\DependencyInjection\Configuration
 */
class ConfigurationTest extends TestCase
{
    public function testDefaultConfiguration(): void
    {
        $configuration = new Configuration();
        $processor = new Processor();
        $node = $configuration->getConfigTreeBuilder()->buildTree();

        $config = ['tabler' => ['options' => ['asset_version' => '1234']]];
        $processedConfig = $processor->process($node, $config);

        $expected = $this->getDefaultConfig()['tabler'];

        $this->assertEquals($expected, $processedConfig);
    }

    public function testFullConfiguration(): void
    {
        $configuration = new Configuration();
        $processor = new Processor();
        $node = $configuration->getConfigTreeBuilder()->buildTree();

        $config = $this->getDefaultConfig();
        $processedConfig = $processor->process($node, $config);

        $this->assertEquals($config['tabler'], $processedConfig);
    }

    /**
     * @return array<string, array<string, array<string, mixed>>>
     */
    protected function getDefaultConfig(): array
    {
        return [
            'tabler' => [
                'options' => [
                    'boxed_layout' => true,
                    'dark_mode' => false,
                    'navbar_condensed' => true,
                    'header_dark' => false,
                    'navbar_dark' => false,
                    'rtl_mode' => false,
                    'user_menu_condensed' => false,
                    'logo_url' => null,
                    'navbar_overlap' => false,
                    'security_cover_url' => 'https://placehold.co/1000',
                    'asset_version' => '1234',
                ],
                'knp_menu' => [
                    'enable' => false,
                    'main_menu' => 'tabler_main',
                    'breadcrumb_menu' => false,
                ],
                'routes' => [
                    'tabler_welcome' => 'home',
                    'tabler_login' => 'login',
                    'tabler_logout' => 'logout',
                    'tabler_login_check' => 'login_check',
                    'tabler_registration' => null,
                    'tabler_registration_register' => null,
                    'tabler_password_reset' => null,
                    'tabler_password_reset_sent' => null,
                ],
                'icons' => [],
            ]
        ];
    }
}
