<?php
namespace Application\Controllers;

use Application\Component\Request;

abstract class Controller
{
    protected $req;

    public function __construct(Request $req)
    {
        $this->req = $req;
    }

    protected function render($template, $params = [])
    {
        if(!file_exists($template)) {
            throw new \Exception('Template not found');
        }
        ob_start();
        include($template);
        echo ob_get_clean();
    }
}