<?php
namespace NgFramework\Core;

use \Klein\Klein;

class Router
{
	private $klein;
	
	public function __construct($routes) 
	{
		$this->klein = new Klein();
		foreach ($routes as $route) {
			list($controllerName, $methodName) = explode("#", $route[2]);
			$controller = $this->_getController($controllerName);
			$this->klein->respond(
				$route[0], // the method (GET|POST|...)
				$route[1], // the pattern
				array($controller, $methodName)	// the (class, method) to call
			);
		}
		$this->klein->onHttpError(function ($code, $router) {
			$controller = new \NgFramework\Core\ErrorController($code, $router);
			$controller->show($code);
		});
	}
	
	public function execute($uri)
	{
		$this->klein->dispatch();
	}
	
	private function _getController($name)
	{
		$controller = '\\App\\Controller\\' . ucfirst($name) . 'Controller';
		return new $controller();
	}
}
