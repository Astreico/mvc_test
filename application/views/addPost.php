<?php
require_once('header.php');
    $title = isset($params['post']) ? $params['post']->title : '';
    $body = isset($params['post']) ? $params['post']->body : '';
    $email= isset($params['post']) ? $params['post']->author_email : '';
?>

<form method="post">
    <div class="panel">
        <div class="modal-content">
            <div class="modal-header">
                <input type="text" name="title" class="form-control" placeholder="Post title" value="<?php echo $title?>">
            </div>
            <div class="modal-body">
                <textarea name="body" class="form-control" rows="10" placeholder="Post content"><?php echo $body?></textarea><br/>
                <div class="row">
                    <div class="col-md-2">
                        <input type="email" class="form-control" name="author_email" placeholder="Enter email" value="<?php echo $email?>"><br/>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-primary btn-sm" name="save_post" value="Save">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

</body>
</html>