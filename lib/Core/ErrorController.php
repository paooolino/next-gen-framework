<?php
namespace NgFramework\Core;

use NgFramework\Core\Controller;

class ErrorController extends Controller
{
	public function show($code)
	{
		echo "Http error $code";
	}
}
