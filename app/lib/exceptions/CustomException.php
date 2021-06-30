<?php

namespace app\lib\exceptions;

use Exception;

/**
 * class CustomException extends Exception and creates custom method for output an exception message
 * And this class is a parent for all exception classes
 */
class CustomException extends Exception {

    /**
     * custom method of exception for output a message
     * 
     * @return string
     * 
     */
    public function customMessage() {
        $exceptionClassName = ' EXCEPTION: ' . get_class($this);
        $exceptionFileName = ' FILE_CALLED: ' . $this->getFile();
        $exceptionLine = ' LINE: ' . $this->getLine();
        $exceptionMessage = ' MESSAGE: ' . $this->getMessage();
        $exceptionTraceAsString = ' THREW: ' . $this->getTraceAsString();

        $message = $exceptionClassName . $exceptionFileName . $exceptionLine . $exceptionMessage . $exceptionTraceAsString;
        return $message;
    }

}

?>