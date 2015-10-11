<?php
namespace Application\Controllers;

use Application\Component;

class AppController
{
    protected $_controller;
    protected $_action;
    protected $_params;

    public function __construct()
    {
        $request = $_SERVER['REQUEST_URI'];
        $parts = explode('/', trim($request, '/'));
        $this->_controller = !empty($parts[0]) ? 'Application\\Controllers\\'.ucfirst($parts[0]).'Controller' : 'Application\\Controllers\\'.'PostController';
        $this->_action = !empty($parts[1]) ? $parts[1].'Action' : 'indexAction';
        if(!empty($parts[2])) {
            array_splice($parts, 0, 2);
            if(count($parts) > 1) {
                $this->_params = $parts;
            } else {
                $this->_params = array_shift($parts);
            }
        }
    }

    public function doAction()
    {
        if(class_exists($this->_controller)) {
            $controller = new $this->_controller(Component\AppRegistry::getRequest());
            $action = method_exists($controller, $this->_action) ? $this->_action : 'indexAction';
            $controller->$action($this->_params);
        } else {
            header('Location: /404');
        }
    }
}