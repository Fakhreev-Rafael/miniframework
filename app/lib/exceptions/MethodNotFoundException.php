<?php

namespace app\lib\exceptions;

use app\lib\exceptions\CustomException;

/**
 * class MethodNotFoundException can be called when method did not found
 */ 
class MethodNotFoundException extends CustomException {

    /**
     * Transfers variable $message to parent contruct
     * 
     * @param string $message
     */
    public function __construct(string $message = 'Method did not found') {
        parent::__construct($message);
    }
}

?>