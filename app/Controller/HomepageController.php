<?php
namespace App\Controller;

use \NgFramework\Core\Controller;

class HomepageController extends Controller
{
	public function show() {
		$data = [];
		$data["content"] = "Hello, world!";
		$this->render($data, "index");
	}
}
