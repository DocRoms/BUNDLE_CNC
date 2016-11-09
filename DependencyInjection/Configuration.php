<?php

namespace docroms\CncBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('cnc');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        $rootNode
            ->children()
            ->scalarNode('mode')->defaultValue('')->end()
            ->scalarNode('production_consumer_key')->defaultValue('')->end()
            ->scalarNode('production_consumer_secret')->defaultValue('')->end()
            ->scalarNode('production_oauth_url')->defaultValue('')->end()
            ->scalarNode('production_access_token')->defaultValue('')->end()
            ->scalarNode('production_access_token_secret')->defaultValue('')->end()
            ->scalarNode('recette_consumer_key')->defaultValue('')->end()
            ->scalarNode('recette_consumer_secret')->defaultValue('')->end()
            ->scalarNode('recette_oauth_url')->defaultValue('')->end()
            ->scalarNode('recette_access_token')->defaultValue('')->end()
            ->scalarNode('recette_access_token_secret')->defaultValue('')->end();

        return $treeBuilder;
    }
}
