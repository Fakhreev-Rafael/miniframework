<?php

namespace app\lib\route;

use app\lib\abstracts\Request;

/**
 * class Route has user's routes and their configurations(Controller, Action, Slugs)
 */
class Route {

    /**
     * Has user's routes and their configurations method GET
     * 
     * @var array $GETRoutes
     */
    private static $GETRoutes = [];

    /**
     * Has user's routes and their configurations method POST
     * 
     * @var array $POSTRoutes
     */
    private static $POSTRoutes = [];

    /**
     * calls method handler and transfers parameters to it
     * 
     * @param string $route
     * @param string $controller
     * @param string $action
     * @param array $namesOfSlugs
     */
    public static function GET(string $route, string $controller, string $action, array $slugsNames = []) {
        self::handler('GET', $route, $controller, $action, $slugsNames);
    }

    /**
     * calls method handler and transfers parameters to it
     * 
     * @param string $route
     * @param string $controller
     * @param string $action
     * @param array $namesOfSlugs
     */
    public static function POST(string $route, string $controller, string $action) {
        self::handler('POST', $route, $controller, $action);
    }

    /**
     * Saves user's routes and their configurations
     * 
     * @param string $method
     * @param string $route
     * @param string $controller
     * @param string $action
     * @param array $namesOfSlugs
     */
    private static function handler(string $method, string $route, string $controller, string $action, array $slugsNames = []) {
        // changes route to pattern of regular expression
        $route = '~^' . $route . '$~';

        if($method === 'GET') {

            if(key_exists($route, self::$GETRoutes)) {
                unset(self::$GETRoutes[$route]);
            }

            self::$GETRoutes[$route] = [
                'controller' => $controller,
                'action' => $action,
                'slugsNames' => $slugsNames,
            ];
        
        } elseif($method === 'POST') {

            if(key_exists($route, self::$POSTRoutes)) {
                unset(self::$POSTRoutes[$route]);
            }

            self::$POSTRoutes[$route] = [
                'controller' => $controller,
                'action' => $action,
                'slugsNames' => $slugsNames,
            ];

        }
        
    }

    /**
     * Returns user's routes
     * 
     * @param Request $request
     */
    public function take(Request $request): array{
        if($request->method() === 'GET') {
            return self::$GETRoutes;
        } elseif($request->method() === 'POST') {
            return self::$POSTRoutes;
        }
    }

}

?>