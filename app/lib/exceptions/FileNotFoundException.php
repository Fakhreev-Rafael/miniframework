<?php

namespace app\lib\exceptions;

use app\lib\exceptions\CustomException;

/**
 * class FileNotFoundException can be called when file did not found
 */ 
class FileNotFoundException extends CustomException {

    /**
     * Transfers variable $message to parent contruct
     * 
     * @param string $message
     */
    public function __construct(string $message = 'File did not found') {
        parent::__construct($message);
    }
}

?>