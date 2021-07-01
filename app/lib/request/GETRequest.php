<?php

namespace app\lib\request;

use app\lib\abstracts\Request;

/**
 * class GETRequest has information about GET request
 * its method, path of uri, parameters
 * extends final class Request
 */
class GETRequest extends Request {

    

    /**
     * Has slugs of current request uri if they exist else has empty array
     * 
     * @var array $slugs
     */
    private $slugs = [];
  

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
     * Handles current request if it has parameters saves them 
     * 
     */
    protected function handler() {
        if($this->method() === 'GET') {
            // if global variable $_GET is not empty
            if(!empty($_GET)) {
                $this->parameters = $_GET;
            }
        } 
    }

}

?>