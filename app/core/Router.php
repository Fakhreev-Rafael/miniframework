<?php

namespace app\core;

use app\lib\abstracts\Request;
use app\lib\exceptions\ClassNotFoundException;
use app\lib\route\Route;

use app\lib\exceptions\UserRoutesDidNotSetException;
use app\lib\exceptions\FileNotFoundException;
use app\lib\exceptions\MethodNotFoundException;

/**
 * class Router takes request and user's routes and calls needed controller and its action
 */
class Router {

    /**
     * @var Request $request
     */
    private $request = null;

    /**
     * @var array $routes
     */
    private $routes = [];

    /**
     * Initialize request and defines user's routes based on method of request
     * 
     * @param Request $request
     * @param Route $userRoutes
     */
    public function __construct(Request $request, Route $userRoutes) {
        $this->request = $request;

        $this->routes = $userRoutes->take($this->request);

    }

    /**
     * Compares request uri's path and user's routes
     * If user set slugs then creates new named slugs and put them to request object
     * Calls method call
     * 
     * @throws UserRoutesDidNotSetException
     */
    public function run() {
        if(!empty($this->routes)) {

            foreach ($this->routes as $pattern => $configurations) {
                
                if(preg_match($pattern, $this->request->path(), $matches)) {
                    
                    array_shift($matches);
                    // if uri's path has slugs and user set names of slugs
                    if((!empty($matches) && !empty($configurations['slugsNames'])) && (count($matches) && count($configurations['slugsNames']))) {

                        for ($i = 0; $i < count($matches); $i++) { 
                            // creates named slugs
                            // concatenates user's names of slugs and uri's path matches
                            $slugs[$configurations['slugsNames'][$i]] = $matches[$i];
                        }

                        $this->request->setSlugs($slugs);

                    }

                    $this->call($configurations);

                }

            }

        } else {
            throw new UserRoutesDidNotSetException();
        }
    }

    /**
     * calls controller and its method if they exist
     * 
     * @param array $configurations
     * 
     * @throws FileNotFoundException
     */
    private function call(array $configurations) {
        $controllerFile = CONTROLLERS . $configurations['controller'] . '.php';
        if(file_exists($controllerFile)) {

            $controllerNamespace = str_replace('/', '\\', CONTROLLERS . $configurations['controller']);

            if(class_exists($controllerNamespace)) {

                $controller = new $controllerNamespace($this->request);

                $action = $configurations['action'];

                if(method_exists($controller, $action)) {

                    $controller->$action();

                    exit();

                } else {

                    throw new MethodNotFoundException("Method {$action} did not found in {$controllerNamespace} class");

                }

            } else {

                throw new ClassNotFoundException("Class {$controllerNamespace} did not found");

            }

        } else {

            throw new FileNotFoundException("File {$controllerFile} did not found");

        }
    }

}

?>