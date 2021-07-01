<?php

namespace app\core;

use app\lib\abstracts\Request;

/**
 * class Model is parent for all user's models
 */
class Model {

    /**
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