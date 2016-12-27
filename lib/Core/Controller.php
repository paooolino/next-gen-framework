<?php
/**
 *	The Controller.
 */
 
namespace NgFramework\Core;

use \NgFramework\Exception\FileNotFoundException;

/**
 *	The Controller base class.
 */
class Controller
{
	private $router;
	private $data;
	
	/**
	 *
	 */
	public function __construct($router = null)
	{
		$this->router = $router;
	}
	
	/**
	 * Render function.
	 *
	 * Data may be provided as string, if the template name is not given.
	 *
	 * @param string|array $data
	 * @param string $template_name
	 *
	 */
	public function render($data, $template_name=null)
	{
		if (is_null($template_name)) {
			if (!is_string($data)) {
				throw new \Exception('Data should be a string.');
			} else {
				return $data;
			}
		} else {
			if (!is_array($data)) {
				throw new \Exception('Data should be an array.');
			} else {
				$loader = new \Twig_Loader_Filesystem('app/View');
				$twig = new \Twig_Environment($loader);
				$twig->addGlobal('router', $this->router);
				$template = $twig->load($template_name . ".html");
				return $template->render($data);
			}
		}
	}
}
