composer require --dev phpunit/phpunit

--------------------------

./vendor/bin/phpunit tests -->

PHPUnit 9.5.0 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.3.1

.                                                                   1 / 1 (100%)

Time: 00:00.005, Memory: 6.00 MB

OK (1 test, 2 assertions)


------------------

si jamais : 

xml version="1.0" encoding="UTF-8"?>
phpunit bootstrap="vendor/autoload.php"
    testsuites
        testsuite name="Application Test Suite"
            directory>./tests directory
        testsuite
    testsuite
phpunit
Créez un fichier de configuration phpunit.xml à la racine de votre projet si vous ne l'avez pas encore fait. Voici un exemple de fichier de configuration 


Assurez-vous que vos fichiers de test, comme UserManagerTest.php, se trouvent dans le répertoire tests.