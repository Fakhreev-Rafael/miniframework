<?php

namespace app\core;

use app\lib\abstracts\Request;

class Controller {

    /**
     * Has information about request
     * 
     * @var Request $request
     */
    protected $request = null;

    /**
     * @param Request $request
     */
    public function __construct(Request $request) {
        $this->request = $request;
    }

}

?>