<?php
namespace App\Controller;

use \NgFramework\Core\Controller;

class TestController extends Controller
{
	public function show() 
	{
		$this->render("Hello, test!");
	}
}