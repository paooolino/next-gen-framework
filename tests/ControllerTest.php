<?php
use PHPUnit\Framework\TestCase;
use \NgFramework\Core\Controller;

class ControllerTest extends TestCase
{
	public function testControllerRenderStringError()
	{
		$this->expectException(Exception::class);
		$controller = new Controller();
		$controller->render(array());
	}
	
	public function testControllerRenderArrayError()
	{
		$this->expectException(Exception::class);
		$controller = new Controller();
		$controller->render("Render this!", "index");
	}
}
