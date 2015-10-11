<?php
require_once __DIR__ . '/vendor/autoload.php';

use Application\Controllers\FrontController;
use Application\Model\PostModel;
use Application\Component\Config;
try {
    $app = new FrontController();
} catch (Exception $e) {
    echo $e->getMessage();
}
/*$db = new \PDO("sqlite:posts.sqlite");
$db->exec("
            CREATE TABLE posts (id INTEGER PRIMARY KEY autoincrement, title VARCHAR(250), body VARCHAR(500),
            author_email VARCHAR(100), add_date DATETIME NOT NULL)
        ");
var_dump($db);*/

/*$model = new PostModel(new Config());
var_dump($model);*/

//print file_get_contents('./application/views/index.php');