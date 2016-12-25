<?php
/**
 *	The Controller.
 */
namespace NgFramework\Core;

/**
 *	The Controller base class.
 */
class Controller
{
	private $data;
	
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
				echo $data;
			}
		} else {
			if (!is_array($data)) {
				throw new \Exception('Data should be an array.');
			} else {
				$loader = new \Twig_Loader_Filesystem('app/View');
				$twig = new \Twig_Environment($loader);
				$template = $twig->load($template_name . ".html");
				echo $template->render($data);
			}
		}
	}
}
