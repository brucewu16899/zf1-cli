#!/usr/local/zend/bin/php
<?php

require_once 'Zend/Loader/Autoloader.php';
require_once 'Zend/Application.php';

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/library'),
    get_include_path(),
)));

try {
	
	$loader = Zend_Loader_Autoloader::getInstance();
	
	$opts = new Zend_Console_Getopt(array(
		'help|h' => 'Display usage inforation.',
		'action|a=s' =>	'action to perform in format of "module.controller.action.param1.param2.param3..."',
		'env|e=s' => 'defines application environment (defaults to "production")'
	));
	
	$opts->setOptions(array(
		'ignoreCase' => true,
		'dashDash' => false
	));
	
	if (isset($opts->help) || count($opts->getOptions()) === 0) {
		echo $opts->getUsageMessage();
		exit(1);
	}
	
	// Define application environment
	defined('APPLICATION_ENV')
	|| define('APPLICATION_ENV', (null === $opts->env) ? 'production' : $opts->env);
	
	// Create application, bootstrap, and run
	$application = new Zend_Application(
			APPLICATION_ENV,
			APPLICATION_PATH . '/configs/application.ini'
	);
	
	if (isset($opts->action)){
		$front = $application->getBootstrap()
							 ->bootstrap('frontController')
							 ->getResource('frontController');
		
		@list($action, $controller, $module) = array_reverse(explode('.', $opts->action));
		
		$request = new Zend_Controller_Request_Simple($action, $controller, $module);
		
		$front->setRequest($request)
			  ->setResponse(new Zend_Controller_Response_Cli())
			  ->setRouter(new Cli_Router())
			  ->throwExceptions(true);
		
		$application->bootstrap()->run();
	}
	
} catch (Zend_Console_Getopt_Exception $execption) {
	echo $execption->getUsageMessage();
	exit(1);
}

