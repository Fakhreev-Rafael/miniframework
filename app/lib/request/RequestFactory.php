<?php

namespace app\lib\request;

use app\lib\abstracts\Request;

/**
 * class RequestFactory use pattern static factory for creating type of request
 */
final class RequestFactory {

    /**
     * Defines method of request and based on it creates request object
     */
    public static function factory(): Request{
        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            return new GETRequest();
        } elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
            return new POSTRequest();
        }
    }

}

?>