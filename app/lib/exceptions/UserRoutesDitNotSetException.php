<?php

namespace app\lib\exceptions;

use app\lib\exceptions\CustomException;

/**
 * class UserRoutesDidNotSetException can be called when user did not set routes
 */
class UserRoutesDidNotSetException extends CustomException {

    /**
     * Transfers variable $message to parent contruct
     * 
     * @param string $message
     */
    public function __construct(string $message = 'User did not set routes') {
        parent::__construct($message);
    }
}

?>