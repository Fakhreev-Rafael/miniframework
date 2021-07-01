<?php

    // includes global settings
    include_once('app/global/global_settings.php');

    // errors
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // autoload class
    spl_autoload_register(function($class) {
        $path = str_replace('\\', '/', $class.'.php');
        if(file_exists($path)) {
            require $path;
        }
    });

    use app\core\Router;
    use app\lib\request\RequestFactory;
    use app\lib\route\Route;

    use app\lib\exceptions\UserRoutesDidNotSetException;
    use app\lib\exceptions\FileNotFoundException;
    use app\lib\exceptions\ClassNotFoundException;
    use app\lib\exceptions\MethodNotFoundException;

    include_once('app/routes/routes.php');
    
    try {
        $router = new Router(RequestFactory::factory(), new Route());

        $router->run();

    } catch (UserRoutesDidNotSetException | FileNotFoundException | ClassNotFoundException | MethodNotFoundException $e) {
        echo $e->customMessage();
    }

?>