<?php

namespace spec\Pub\BehatResponsiveFeaturesExtension\Suite;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ResponsiveSuiteGeneratorSpec extends ObjectBehavior
{
    function it_is_a_suite_generator()
    {
        $this->shouldHaveType('Behat\Testwork\Suite\Generator\SuiteGenerator');
    }

    function it_supports_responsive_suites_with_settings()
    {
        $this->supportsTypeAndSettings('pub_responsive_suite', [])->shouldBe(true);
    }

    function it_does_not_support_other_suite_types()
    {
        $this->supportsTypeAndSettings(null, [])->shouldBe(false);
    }

    function it_generates_a_responsive_suite()
    {
        $suite = $this->generateSuite('my_suite', []);
        $suite->shouldBeAnInstanceOf('Pub\BehatResponsiveFeaturesExtension\Suite\ResponsiveSuite');
    }
}
