<?php
/**
 *	The Router.
 */
 
namespace NgFramework\Core;

use \Klein\Klein;

/**
 *	The Router class definition.
 */
class Router
{
	/**
	 *
	 */
	private $routes;
	
	/**
	 * @param array $routes
	 */
	public function __construct($routes) 
	{
		foreach ($routes as $route) {
			$this->addRoute($route);
		}
	}
	
	/**
	 * 
	 */
	public function getRoutes()
	{
		return $this->routes;
	}
	
	/**
	 * @param array $route
	 */
	public function addRoute($route)
	{
		list($controller, $action) = explode("#", $route[2]);
		$this->routes[] = array(
			"method" => $route[0], 
			"pattern" => $route[1], 
			"controller" => $controller, 
			"action" => $action
		);
	}
	
	/**
	 * Process the route and calls the right controller.
	 *
	 * @param string $uri
	 */
	public function execute($uri)
	{
		$klein = new Klein();
		foreach ($this->routes as $r) {
			$klein->respond(
				$r["method"],
				$r["pattern"],
				array($this->_getController($r["controller"]), $r["action"])
			);
		}
		$klein->dispatch();
	}

	/**
	 * Get an instance of a controller type based on the provided name.
	 *
	 * @param string $name
	 */	
	private function _getController($name)
	{
		$controller = '\\App\\Controller\\' . ucfirst($name) . 'Controller';
		return new $controller();
	}
}
