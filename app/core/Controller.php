<?php

namespace app\core;

use app\lib\abstracts\Request;
use app\core\Model;

/**
 * class Controller is parent for all user's controllers
 */

class Controller {

    /**
     * Has information about request
     * 
     * @var Request $request
     */
    protected $request = null;

    /**
     * Has main model
     * 
     * @var Model $model
     */
    protected $model = null;

    /**
     * @param Request $request
     */
    public function __construct(Request $request) {
        $this->request = $request;

        $this->model = new Model($this->request);
    }

}

?>