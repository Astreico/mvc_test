<?php
namespace Application\Component;

class Config
{
    protected $_config;

    public function __construct()
    {
        if(!file_exists('./application/config/config.ini')) {
            throw new \Exception('Configuration file not found');
        }
        $this->_config = parse_ini_file('./application/config/config.ini', true);
    }

    public function get($key)
    {
        if(isset($this->_config[$key])) {
            return $this->_config[$key];
        }
        return false;
    }
}