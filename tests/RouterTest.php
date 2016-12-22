<?php
use PHPUnit\Framework\TestCase;
use \NgFramework\Core\Router;
use \NgFramework\Core\Controller;

class RouterTest extends TestCase
{
	public function testNonExistentRoute()
	{
		$routes = [
			["GET", "/", "test#show"]
		];
		$router = new Router($routes);
		$router->execute("/non-existent-page/");
	}
	
	public function testHandlesNonExistentController()
	{
		/*
		$routes = [
			["GET", "/", "Unavailable#show"]
		];
		$router = new Router($routes);
		$router->execute("/");
		*/
	}
	
	public function testHandlesNonExistentMethod()
	{
		/*
		$routes = [
			["GET", "/", "Test#unavailable"]
		];
		$router = new Router($routes);
		$router->execute("/");
		*/
	}
	
	public function testExecutesExistentController()
	{
		$routes = [
			["GET", "/", "Test#show"]
		];
		$router = new Router($routes);
		
		ob_start();
		$router->execute("/");
		$output = ob_get_contents();
		ob_end_clean();
		
		$this->assertEquals("Hello, test!", $output);
	}
}
