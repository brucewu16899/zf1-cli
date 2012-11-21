Zend Framework Cli
===================
* Zend Framework Cli
* Zend Framework multi database

Requirements
--------
* PHP 5.3+
* Zend Framework 1.1+

Configure
----------
* public/index.php  `#!/usr/local/zend/bin/php`
* php.ini `include_path = "/usr/local/zend/share/ZendFramework/library"`

How to use
-----------
at **public** folder

* ./index.php --help
* ./index.php --action defaults.index.index
* ./index.php --action defaults.crawler.run

Environment Test 
-------------------------
* ./index.php -a defaults.env.debug
* ./index.php -a defaults.env.debug -e development

Feature 0.2
------------
 * performance tuning
 * multi threading
