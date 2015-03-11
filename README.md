BehatResponsiveFeaturesExtension
===============================
- Brought to you by [2bePUBLISHED]
- Developed by [Christoph Rosse](http://gries.tv)

[![Build Status](https://secure.travis-ci.org/2bepublished/BehatResponsiveFeaturesExtension.png)](http://travis-ci.org/2bepublished/BehatResponsiveFeaturesExtension)

About
-----

A behat extension that enables features to be enabled/disabled for different screen sizes.

Installation
------------

BehatResponsiveFeaturesExtension can be installed via composer

    composer require "2bepublished/behat-responsive-suite-extension"

Usage
-----

Step 1: Activate the extension in your behat.yml

```yaml
default:
  suites:
    ...
  extensions:
    Pub\BehatResponsiveSuiteExtension\Extension: ~
```

Step 2: Define a suite that uses responsive features.
In the step you'll also have to define the screen-width that this suite will use.

```yaml
default:
  suites:
    ios_7_iphone5:
      paths:  [ %paths.base%/features/ ]
      contexts: [ Feature ]
      type: pub_responsive_suite    # required: this instructs Behat to use the responsive suite. 
      screen-width: 320             # required: this sets the width for that suite
      mink_session: ios_7_iphone5   # optional: the mink session is optional if you don't use mink. 
```

Step 3: Use the width tags inside your feature definitions:
* @min-width:xxx - takes min-width in pixels 
* @all-widths    - if want a feature to run on all responsive-suites use this tag.

```gherkin
@all-widths
Feature: A very important feature
  In order to see this very important feature
  As a User
  I don't need a big screen
```

```gherkin
@min-width:500
Feature: A very big feature
  In order to see this very big feature
  As a User
  I need a screen with at least 500px
```

For a bigger example configuration using browser-stack please have a look at the [example configuration.](examples/browser-stack.behat.yml)

Features
--------
- Tag Features with a minimal required width so they are not executed on test-suites with smaller screens.


Limitations
-----------

- Only width filtering is currently allowd
- Features that should execute on all configurations need the `@all-widths` tag

LICENSE
-------

See `LICENSE` file.
