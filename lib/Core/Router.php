<?php
namespace NgFramework\Core;

use \Klein\Klein;
use \App\Controller;

class Router
{
	private $klein;
	
	public function __construct($routes) {
		$this->klein = new Klein();
		foreach ($routes as $route) {
			list($controllerName, $methodName) = explode("#", $route[2]);
			$controller = $this->_getController($controllerName);
			$this->klein->respond(
				$route[0], 
				$route[1],
				array($controller, $methodName)
			);
		}
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
