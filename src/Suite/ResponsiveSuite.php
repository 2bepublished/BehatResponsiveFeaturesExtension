<?php

namespace Pub\BehatResponsiveFeaturesExtension\Suite;

use Behat\Testwork\Suite\Exception\ParameterNotFoundException;
use Behat\Testwork\Suite\Suite;

final class ResponsiveSuite implements Suite
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var array
     */
    private $settings = array();

    /**
     * Initializes suite.
     *
     * @param string $name
     * @param array  $settings
     */
    public function __construct($name, array $settings)
    {
        $this->name = $name;
        $this->settings = $settings;

        if (isset($settings['screen_width'])) {
            $this->generateScreenFilters($settings['screen_width']);
        }

    }

    /**
     * Returns unique suite name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns suite settings.
     *
     * @return array
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * Checks if a setting with provided name exists.
     *
     * @param string $key
     *
     * @return Boolean
     */
    public function hasSetting($key)
    {
        return isset($this->settings[$key]);
    }

    /**
     * Returns setting value by its key.
     *
     * @param string $key
     *
     * @return mixed
     *
     * @throws ParameterNotFoundException If setting is not set
     */
    public function getSetting($key)
    {
        if (!$this->hasSetting($key)) {
            throw new ParameterNotFoundException(sprintf(
                '`%s` suite does not have a `%s` setting.',
                $this->getName(),
                $key
            ), $this->getName(), $key);
        }

        return $this->settings[$key];
    }

    private function generateScreenFilters($width)
    {
        if (!isset($this->settings['filters']['tags'])) {
            $this->settings['filters']['tags'] = '@all-widths';
        } else {
            $this->settings['filters']['tags'] .= '&&@all-widths';
        }

        for ($i = $width; $i > 0; $i--) {
            $filtername = sprintf(',@min-width:%s', $i);

            $this->settings['filters']['tags'] .= $filtername;
        }
    }
}
