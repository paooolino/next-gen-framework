<?php
/**
 *	The Router.
 */
 
namespace NgFramework\Core;

use \NgFramework\Exception\ClassNotFoundException;
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
	private $router_app;
	
	/**
	 * @param array $routes
	 */
	public function __construct($routes) 
	{
		$this->router_app = new Klein();
		foreach ($routes as $route) {
			$this->addRoute($route);
		}
	}
	
	public function getResponseBody() {
		return $this->router_app->response()->body();
	}
	
	/**
	 * 
	 */
	public function getRoutes()
	{
		return $this->routes;
	}
	
	/**
	 *
	 */
	public function link($route_name) {
		foreach ($this->routes as $r) {
			if ($route_name == $r["controller"] . "#" . $r["action"]) {
				return $r["pattern"];
			}
		}
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
		foreach ($this->routes as $r) {
			$callable = array($this->_getController($r["controller"]), $r["action"]);
			if (!is_callable($callable)) {
				throw new \BadMethodCallException ("Please create a ". $r["action"] ." method in ". ucfirst($r["controller"]) ."Controller class in the app/Controller/'" . ucfirst($r["controller"]) . "Controller.php file.");
			}
			$this->router_app->respond(
				$r["method"],
				$r["pattern"],
				$callable
			);
		}
		$this->router_app->dispatch();
	}

	/**
	 * Get an instance of a controller type based on the provided name.
	 *
	 * @param string $name
	 */	
	private function _getController($name)
	{
		$controller_name = '\\App\\Controller\\' . ucfirst($name) . 'Controller';
		if (!class_exists($controller_name)) {
			throw new ClassNotFoundException("Please create a ". ucfirst($name). "Controller class in the app/Controller/" . ucfirst($name) . "Controller.php file.");
		}
		return new $controller_name($this);
	}
}
