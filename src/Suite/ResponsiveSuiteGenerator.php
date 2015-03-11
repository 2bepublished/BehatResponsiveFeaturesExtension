<?php

namespace Pub\BehatResponsiveFeaturesExtension\Suite;

use Behat\Testwork\Suite\Generator\SuiteGenerator;

class ResponsiveSuiteGenerator implements SuiteGenerator
{
    /**
     * @var array
     */
    private $defaultSettings = array();

    /**
     * Initializes suite generator.
     *
     * @param array $defaultSettings
     */
    public function __construct(array $defaultSettings = array())
    {
        $this->defaultSettings = $defaultSettings;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsTypeAndSettings($type, array $settings)
    {
        return 'pub_responsive_suite' === $type;
    }

    /**
     * {@inheritdoc}
     */
    public function generateSuite($suiteName, array $settings)
    {
        return new ResponsiveSuite($suiteName, $this->mergeDefaultSettings($settings));
    }

    /**
     * Merges provided settings into default ones.
     *
     * @param array $settings
     *
     * @return array
     */
    private function mergeDefaultSettings(array $settings)
    {
        return array_merge($this->defaultSettings, $settings);
    }
}
