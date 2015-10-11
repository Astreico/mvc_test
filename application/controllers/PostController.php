<?php
namespace Application\Controllers;

use Application\Component\Request;
use Application\Model\Entity\Post;
use Application\Model\PostModel;
use Application\Component\AppRegistry;

class PostController extends Controller
{
    protected $_model;

    public function __construct(Request $req)
    {
        parent::__construct($req);
        $this->_model = new PostModel(AppRegistry::getConfig());
    }

    public function indexAction()
    {
        $posts = $this->_model->indexPost();
        $this->render('./application/views/indexPost.php', ['posts' => $posts]);
    }

    public function addAction()
    {
        $result = [];
        $save_post = $this->req->get('save_post');
        if($save_post) {
            $title = $this->req->get('title');
            $body = $this->req->get('body');
            $author_email = $this->req->get('author_email');

            $post = new Post();
            $post->setFields($title, $body, $author_email);
            $result = $this->_model->addPost($post);
            if(isset($result['result'])) {
                $result['success'] = 'Post successfully added!';
            } else {
                $result['post'] = $post;
            }
        }
        $this->render('./application/views/addPost.php', $result);
    }

    public function editAction($id)
    {
        $result = $this->_model->getPostById($id);
        $save_post = $this->req->get('save_post');
        if($save_post) {
            $title = $this->req->get('title');
            $body = $this->req->get('body');
            $author_email = $this->req->get('author_email');

            $post = new Post();
            $post->setFields($title, $body, $author_email);
            $result = $this->_model->editPost($post, $id);
            if(!isset($result['errors'])) {
                $result['success'] = 'Post successfully edited';
            }
            $result['post'] = $post;
        }
        $this->render('./application/views/editPost.php', $result);
    }

    public function deleteAction($id)
    {
        $this->_model->deletePost($id);
        header('Location: /');
    }
}