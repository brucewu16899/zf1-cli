Zend Framework Cli
===================

* Zend Framework Cli
* Zend Framework multi database

Configure
----------
1. modify public/index.php line 1 `#!/usr/local/zend/bin/php`
2. php.ini add zend framework include_path = ".:/usr/local/zend/share/ZendFramework/library:/usr/local/zend/share/pear"

How to use
------------
change directory to "public" folder

    ./index.php --help
    ./index.php --action defaults.index.index
    ./index.php --action defaults.crawler.run

Environment Test Example
--------------------------
    ./index.php -a defaults.env.debug
    ./index.php -a defaults.env.debug -e development

Feature 0.2
--------
    1. performance tuning
    2. multi threading
