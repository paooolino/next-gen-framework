<?php
use PHPUnit\Framework\TestCase;
use \NgFramework\Core\Router;
use \NgFramework\Exception\ClassNotFoundException;

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
	
	public function testControllerExecute()
	{
		$expected_output = "Test";
		
		$routes = [
			["GET", "/", "test#show"]
		];
		$router = new Router($routes);
		$router->execute("/");
		
		$this->expectOutputString($expected_output);
		$this->assertSame(
			$expected_output,
			$router->getResponseBody()
		);
	}
	
	public function testControllerNotFound()
	{
		$this->expectException(ClassNotFoundException::class);
		
		$routes = [
			["GET", "/", "nonexistent#show"]
		];
		$router = new Router($routes);
		$router->execute("/");
	}
	
	public function testControllerMethodNotFound()
	{
		$this->expectException(BadMethodCallException::class);
		
		$routes = [
			["GET", "/", "test#nonexistent"]
		];
		$router = new Router($routes);
		$router->execute("/");
	}
}
