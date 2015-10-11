<?php
namespace Application\Model;

use Application\Component\Config;

abstract class Model
{
    protected $_db;

    public function __construct(Config $config)
    {
        $data = $config->get('db_config');
        $this->_db = new \PDO("{$data['source']}:{$data['db_name']}");
    }

    public function getDb()
    {
        return $this->_db;
    }
}