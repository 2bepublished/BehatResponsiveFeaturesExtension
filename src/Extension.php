<?php
namespace Pub\BehatResponsiveFeaturesExtension;
use Behat\Testwork\ServiceContainer\Extension as ExtensionInterface;
use Behat\Testwork\ServiceContainer\ExtensionManager;
use Behat\Testwork\Suite\ServiceContainer\SuiteExtension;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;


class Extension implements ExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigKey()
    {
        return 'responsive_suite';
    }
    /**
     * {@inheritdoc}
     */
    public function initialize(ExtensionManager $extensionManager)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function configure(ArrayNodeDefinition $builder)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function load(ContainerBuilder $container, array $config)
    {
       $this->loadSuiteGenerator($container, $config);
    }
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
    }


    private function loadSuiteGenerator(ContainerBuilder $container, array $config)
    {
        $definition = new Definition('Pub\BehatResponsiveFeaturesExtension\Suite\ResponsiveSuiteGenerator', array(
            $config,
        ));
        $definition->addTag(SuiteExtension::GENERATOR_TAG, array('priority' => 100));
        $container->setDefinition('alpin.responsive_features_extension.suite.generator', $definition);
    }
}