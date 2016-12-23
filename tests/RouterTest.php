<?php
use PHPUnit\Framework\TestCase;
use \NgFramework\Core\Router;

class RouterTest extends TestCase
{
	public function testRouterInstantiation()
	{
		$routes = [
			["GET", "/", "test#show"]
		];
		$router = new Router($routes);
		$router_routes = $router->getRoutes();
		
		$this->assertInstanceOf(Router::class, $router);
		$this->assertEquals(1, count($router_routes));
		$this->assertEquals(array(
			"method" => "GET", 
			"pattern" => "/", 
			"controller" => "test", 
			"action" => "show"	
		), $router_routes[0]);
	}
}
