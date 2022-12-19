<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges the TablerBundle configuration
 *
 * @see http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class
 */
class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('tabler');
        /** @var ArrayNodeDefinition $rootNode */
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->append($this->getOptionsConfig())
                ->append($this->getKnpMenuConfig())
                ->append($this->getRouteAliasesConfig())
                ->arrayNode('icons')
                    ->defaultValue([])
                    ->scalarPrototype()
                ->end()
            ->end()
        ->end();

        return $treeBuilder;
    }

    private function getRouteAliasesConfig(): NodeDefinition
    {
        $treeBuilder = new TreeBuilder('routes');
        /** @var ArrayNodeDefinition $rootNode */
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('tabler_welcome')
                    ->defaultValue('home')
                    ->info('name of the homepage route')
                ->end()
                ->scalarNode('tabler_login')
                    ->defaultValue('login')
                    ->info('name of the form login route')
                ->end()
                ->scalarNode('tabler_logout')
                    ->defaultValue('logout')
                    ->info('name of the logout route')
                ->end()
                ->scalarNode('tabler_login_check')
                    ->defaultValue('login_check')
                    ->info('name of the form login_check route')
                ->end()
                ->scalarNode('tabler_registration')
                    ->defaultNull()
                    ->info('name of the user registration form route')
                ->end()
                ->scalarNode('tabler_registration_register')
                    ->defaultNull()
                    ->info('name of the user registration form processing route')
                ->end()
                ->scalarNode('tabler_password_reset')
                    ->defaultNull()
                    ->info('name of the forgot-password form route')
                ->end()
            ->end()
        ->end();

        return $rootNode;
    }

    private function getKnpMenuConfig(): NodeDefinition
    {
        $treeBuilder = new TreeBuilder('knp_menu');
        /** @var ArrayNodeDefinition $rootNode */
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->booleanNode('enable')
                    ->defaultFalse()
                    ->info('')
                ->end()
                ->scalarNode('main_menu')
                    ->defaultValue('tabler_main')
                    ->info('your builder alias')
                ->end()
                ->scalarNode('breadcrumb_menu')
                    ->defaultFalse()
                    ->info('Your builder alias or false to disable breadcrumbs')
                ->end()
            ->end()
        ->end();

        return $rootNode;
    }

    private function getOptionsConfig(): NodeDefinition
    {
        $treeBuilder = new TreeBuilder('options');
        /** @var ArrayNodeDefinition $rootNode */
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->booleanNode('dark_mode')
                    ->defaultFalse()
                ->end()
                ->booleanNode('header_dark')
                    ->defaultFalse()
                ->end()
                ->booleanNode('navbar_dark')
                    ->defaultFalse()
                ->end()
                ->booleanNode('navbar_condensed')
                    ->defaultTrue()
                ->end()
                ->booleanNode('navbar_overlap')
                    ->defaultFalse()
                ->end()
                ->booleanNode('boxed_layout')
                    ->defaultTrue()
                ->end()
                ->booleanNode('rtl_mode')
                    ->defaultFalse()
                ->end()
                ->booleanNode('user_menu_condensed')
                    ->defaultFalse()
                ->end()
                ->scalarNode('logo_url')
                    ->defaultNull()
                ->end()
            ->end()
        ->end();

        return $rootNode;
    }
}
