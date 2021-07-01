<?php

namespace app\lib;

use app\lib\abstracts\Request;

/**
 * class GETRequest has information about GET request
 * its method, path of uri, parameters
 */
class POSTRequest extends Request {

    
    /**
     * Handles current request if it has parameters saves them 
     * 
     */
    protected function handler() {
        if($this->method() === 'POST') {
            // if global variable $_POST is not empty
            if(!empty($_POST)) {
                $this->parameters = $_POST;
            // else checks request for JSON data
            } else {
                $JSONdata = file_get_contents('php://input');
                $data = json_decode($JSONdata, true);
                // if request has JSON data
                if(!empty($data)) {
                    $this->parameters = $data;
                }
            }
        }
    }

}

?>