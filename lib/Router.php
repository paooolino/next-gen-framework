<?php
namespace NgFramework;

use \Klein\Klein;

class Router
{
	function __construct($routes) {
		$klein = new Klein();

		$klein->respond('GET', '/', function () {
				return 'Hello World!';
		});

		$klein->dispatch();
	}
}
