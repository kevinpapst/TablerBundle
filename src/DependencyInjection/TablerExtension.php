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
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class TablerExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $options = $this->getContextOptions($config);

        if (!empty($config)) {
            $container->setParameter('tabler_bundle.options', $options);
        }

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../../config'));
        $loader->load('services.yml');

        if (\array_key_exists('knp_menu', $options) && \array_key_exists('enable', $options['knp_menu']) && $options['knp_menu']['enable'] === true) {
            $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../../config/container'));
            $loader->load('knp-menu.yml');
        }
    }

    /**
     * Merge available configuration options, so they are all available for the ContextHelper.
     *
     * @param array<string, mixed> $config
     * @return array<string, array<string, mixed>>
     */
    private function getContextOptions(array $config): array
    {
        $contextOptions = (array) ($config['options'] ?? []);
        $contextOptions['knp_menu'] = (array) ($config['knp_menu'] ?? []);

        return $contextOptions;
    }

    public function prepend(ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $configs = $container->getExtensionConfig($this->getAlias());
        $config = $this->processConfiguration($configuration, $configs);

        $options = (array) ($config['options'] ?? []);
        $routes = (array) ($config['routes'] ?? []);
        $icons = (array) ($config['icons'] ?? []);

        $container->setParameter('tabler_bundle.options', $options);
        $container->setParameter('tabler_bundle.routes', $routes);
        $container->setParameter('tabler_bundle.icons', $icons);
    }
}
