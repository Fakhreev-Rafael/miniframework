<?php

namespace app\lib\abstracts;

/**
 * abstract class Request has information about request
 * Its method, path and handler of request
 */
abstract class Request {

    /**
     * Has method of request
     * 
     * @var string $method
     */
    protected $method;

     /**
     * Has path of request's uri
     * 
     * @var string $path
     */
    protected $path;

    /**
     * Has
     * 
     * @var array $parameters
     */
    private $parameters = [];

    /**
     * Has slugs of current request uri if they exist else has empty array
     * 
     * @var array $slugs
     */
    private $slugs = [];

    /**
     * Defines method of current request
     * Also takes path of its uri
     * And calls handler
     */
    public function __construct() {
        $this->method = $_SERVER['REQUEST_METHOD'];

        $this->path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $this->handler();


    }

    /**
     * Returns method of request
     * 
     * @return string
     */
    public function method() {

        return $this->method;

    }

    /**
     * Returns path of request's uri
     * 
     * @return string
     */
    public function path() {

        return $this->path;

    }
    
    /**
     * Returns parameters of current request if they exist else returns empty array
     * 
     * @return array
     */
    public function parameters(): array{

        return $this->parameters;

    }

    /**
     * Sets slugs if current request 
     * 
     * @param array $slugs
     */
    public function setSlugs(array $slugs) {

        $this->slugs = $slugs;

    }

    /**
     * Returns slugs of current request if they set else returns empty array
     * 
     * @return array
     */
    public function slugs(): array{

        return $this->slugs;

    }

    /**
     * Handles request
     */
    abstract protected function handler();

}

?>