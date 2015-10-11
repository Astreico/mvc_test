<?php
namespace Application\Controllers;

use Application\Component\AppRegistry;
use Application\Model\PostModel;

class FrontController
{
    protected $_controller;
    protected $_action;

    public function __construct()
    {
        $this->run();
    }

    public function run()
    {
        $app_controller = new AppController();
        $app_controller->doAction();
    }
}