<?php
namespace Application\Component;

class AppRegistry
{
    private static $instance = null;
    protected $_request;
    protected $_config;

    private function __construct() {}

    static function instance() {
        if ( is_null(self::$instance) ) { self::$instance = new self(); }
        return self::$instance;
    }

    static function getRequest()
    {
        $registry = self::instance();
        if(is_null($registry->_request)) {
            $registry->_request = new Request();
        }
        return $registry->_request;
    }

    static function getConfig()
    {
        $registry = self::instance();
        if(is_null($registry->_config)) {
            $registry->_config = new Config();
        }
        return $registry->_config;
    }
}