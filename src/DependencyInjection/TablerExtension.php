<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader;

class TablerExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $options = (array) ($config['options'] ?? []);
        $options['knp_menu'] = (array) ($config['knp_menu'] ?? []);
        $routes = (array) ($config['routes'] ?? []);
        $icons = (array) ($config['icons'] ?? []);

        $container->setParameter('tabler_bundle.options', $options);
        $container->setParameter('tabler_bundle.routes', $routes);
        $container->setParameter('tabler_bundle.icons', $icons);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../../config'));
        $loader->load('services.yml');

        if (\array_key_exists('enable', $options['knp_menu']) && $options['knp_menu']['enable'] === true) {
            $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../../config/container'));
            $loader->load('knp-menu.yml');
        }
    }
}
