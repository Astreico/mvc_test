<?php
require_once('header.php');
if(isset($params['post'])) {
?>
    <form method="post">
    <div class="panel">
        <div class="modal-content">
            <div class="modal-header">
                <input type="text" name="title" class="form-control" value="<?php echo $params['post']->title ?>">
            </div>
            <div class="modal-body">
                <textarea name="body" class="form-control" rows="10"><?php echo $params['post']->body ?></textarea><br/>
                <div class="row">
                    <div class="col-md-2">
                        <input type="email" class="form-control" name="author_email" value="<?php echo $params['post']->author_email ?>"><br/>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-primary btn-sm" name="save_post" value="Save">&nbsp;
                        <a href="/post/delete/<?php echo $params['post']->id?>" class="btn btn-primary btn-sm">Delete post</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
<?php
}
?>
</body>
</html>