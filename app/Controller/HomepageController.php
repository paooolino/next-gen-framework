<?php
namespace App\Controller;

use \NgFramework\Core\Controller;

class HomepageController extends Controller
{
	public function show() {
		$this->render("Hello, world!");
	}
}
