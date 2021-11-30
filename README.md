

== Code Style

For PHP there are two tools installed to help formatting code.
It is suggested you run them before locally before creating your pull request.


=== PHP CS Fixer

To fix your code run:

vendor/bin/php-cs-fixer fix --verbose --config=php-cs-fixer.php

Documentation about the rules:

https://mlocati.github.io/php-cs-fixer-configurator/#version:3.0

=== PHPStan

vendor/bin/phpstan analyse src tests --level 8

This tool does not fix the code, it only lists the lines where the code needs fixing.

Documentation:

https://phpstan.org/user-guide/getting-started


=== PHPUnit

php ./vendor/bin/phpunit



