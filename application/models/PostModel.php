<?php
namespace Application\Model;

use Application\Model\Entity\Post;

class PostModel extends Model
{

    public function indexPost()
    {
        $stmt = $this->_db->query('SELECT * FROM posts ORDER BY add_date DESC;');
        $posts = $stmt->fetchAll(\PDO::FETCH_CLASS, '\\Application\\Model\\Entity\\Post');
        return $posts;
    }

    public function addPost(Post $post)
    {
        $result = [];
        $validate = $this->validatePost($post);
        if(!empty($validate['errors'])) {
            $result['errors'] = $validate['errors'];
            return $result;
        }

        $stmt = $this->_db->prepare('
            INSERT into posts (title, body, author_email, add_date) VALUES (:title, :body, :author_email, :add_date)
        ');

        $result['result'] = $stmt->execute([
            ':title' => $post->title,
            ':body' => $post->body,
            ':author_email' => $post->author_email,
            ':add_date' => $post->add_date,
        ]);
        return $result;
    }

    public function editPost(Post $post, $id)
    {
        $result = [];
        $validate = $this->validatePost($post);
        if(!empty($validate['errors'])) {
            $result['errors'] = $validate['errors'];
            return $result;
        }

        $stmt = $this->_db->prepare('
            UPDATE `posts` SET title = :title, body = :body, author_email = :author_email WHERE id = :id
        ');

        $stmt->execute([
            ':id' => $id,
            ':title' => $post->title,
            ':body' => $post->body,
            ':author_email' => $post->author_email,
        ]);

        return $result;
    }

    public function deletePost($id)
    {
        $id = (int) $id;
        $this->_db->exec("
            DELETE FROM posts WHERE id = {$id}
        ");
    }

    public function getPostById($id)
    {
        $result = [];
        $id = (int) $id;
        $stmt = $this->_db->query("SELECT * FROM posts WHERE id = {$id}");
        $post = $stmt->fetchObject('\\Application\\Model\\Entity\\Post');
        if($post) {
            $result['post'] = $post;
        } else {
            $result['errors'][] = 'Post not found';
        }
        return $result;
    }

    public function validatePost(Post $post)
    {
        $result = [];
        if(empty($post->title)) {
            $result['errors'][] = 'Enter post title';
        }
        if(empty($post->body)) {
            $result['errors'][] = 'Enter post body';
        }
        if(empty($post->author_email)) {
            $result['errors'][] = 'Enter email';
        }
        return $result;
    }
}