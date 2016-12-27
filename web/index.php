<?php 
/**
 * Environment settings
 */
ini_set('display_errors', 1);
define( 'REDBEAN_MODEL_PREFIX', '\\App\\Model\\' );

/**
 * Autoloading vendor and framework classes as defined in composer.json
 * Warning: after changing composer.json, regenerate autoload with
 *		composer update
 */
require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Bootstrap router
 */
require_once __DIR__ . '/../config/routes.php';
$router = new \NgFramework\Core\Router($routes);
$router->execute($_SERVER["REQUEST_URI"]);
