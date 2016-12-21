<?php
use PHPUnit\Framework\TestCase;
use \NgFramework\Router;

class RouterTest extends TestCase
{
	public function testExecutesController()
	{
		$routes = array(
			"/" => "Homepage#show"
		);
	}
}
