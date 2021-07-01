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