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

BehatResponsiveFeaturesExtension can be installed via composer.

### With Git

    composer require "2bepublished/behat-responsive-suite-extension"

Usage
-----

To add namespaces to all classes in a directory and save them to another directory, you just have to:

    $ namespacify go ~/input-dir ~/output-dir

There are three options you can use to customize the generated output. The `--prefix` option can be used to prefix the namespace.

    $ namespacify go ~/input-dir ~/output-dir --prefix=MyVendorName

It is also possible to exclude classes based on the file name. The exlude option supports regular expressions:

    $ namespacify go ~/input-dir ~/output-dir --exlucde="SomeFile(s)?"

If the applicatio nrequires custom transformations there is the `--transformer` option. The value should be a PHP file which contains a transformer class:

    $ namespacify go ~/input-dir ~/output-dir --transformer=./my-app-transformer.php

The transformer file could look like this. It is important that the name of the class and the `transform` method are not changed.

    <?php

    class CodeTransformerCallback
    {
        static public function transform($class)
        {
            $code = $class['code'];

            $code = str_replace(
                array(
                    // search
                ),
                array(
                    // replace
                ),
                $code
            );

            $class['code'] = $code;
            return $class;
        }
    }

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