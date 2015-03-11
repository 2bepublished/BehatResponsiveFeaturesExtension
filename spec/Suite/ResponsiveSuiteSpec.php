<?php

namespace spec\Pub\BehatResponsiveFeaturesExtension\Suite;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ResponsiveSuiteSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('my_suite', []);
    }

    function it_is_a_suite()
    {
        $this->shouldHaveType('Behat\Testwork\Suite\Suite');
    }

    function it_can_generates_tag_filters_if_a_screen_width_is_provided()
    {
        $this->beConstructedWith('my_suite', ['screen_width' => 3]);

        $expectedFilters = '@all-widths,@min-width:3,@min-width:2,@min-width:1';

        $this->getSetting('filters')->shouldBeLike(['tags' => $expectedFilters]);
    }

    function it_appends_tag_filters_to_previously_set_filters()
    {
        $this->beConstructedWith('my_suite', ['screen_width' => 3, 'filters' => ['tags' => '@custom-filter' ]]);

        $expectedFilters = '@custom-filter&&@all-widths,@min-width:3,@min-width:2,@min-width:1';
        $this->getSetting('filters')->shouldBeLike(['tags' => $expectedFilters]);
    }
}
