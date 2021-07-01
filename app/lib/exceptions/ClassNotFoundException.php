<?php

namespace app\lib\exceptions;

use app\lib\exceptions\CustomException;

/**
 * class ClassNotFoundException can be called when class did not found
 */ 
class ClassNotFoundException extends CustomException {

    /**
     * Transfers variable $message to parent contruct
     * 
     * @param string $message
     */
    public function __construct(string $message = 'Class did not found') {
        parent::__construct($message);
    }
}

?>