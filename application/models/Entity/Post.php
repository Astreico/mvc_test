<?php
namespace Application\Model\Entity;

class Post
{
    public $id;
    public $title;
    public $body;
    public $author_email;
    public $add_date;

    public function setFields($title, $body, $author_email)
    {
        $this->title = $title;
        $this->body = $body;
        $this->author_email = $author_email;
        $this->add_date = date('Y-m-d H:i:s');
    }
}