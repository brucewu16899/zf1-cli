<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initAutoload()
	{
		return new Zend_Application_Module_Autoloader(array('namespace' => '', 'basePath' => APPLICATION_PATH));
	}
	
	protected function _initActionHelperBroker()
	{
		Zend_Controller_Action_HelperBroker::addPath(APPLICATION_PATH.'/controllers/helpers');
	}

	protected function _initSetNoRenderer()
	{
		Zend_Controller_Front::getInstance()->setParam('noViewRenderer', true);
	}
	
	protected function _initDbAdapter()
	{
		$resource = $this->getPluginResource('multidb')->init();

		Zend_Registry::set('github', $resource->getDb('github'));
		Zend_Registry::set('fliptop', $resource->getDb('fliptop'));
	}
}
