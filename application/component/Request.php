<?php
namespace Application\Component;

class Request
{
    protected $_request;

    public function __construct()
    {
        $this->_request = $_REQUEST;
    }

    public function get($key)
    {
        if(isset($this->_request[$key])) {
            return $this->_request[$key];
        }
        return false;
    }

}