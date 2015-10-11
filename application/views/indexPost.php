<?php
require_once('header.php');
if(!$params['posts']) {
    echo '<div class="alert alert-success" role="alert">There is no posts yet. <a href="/post/add">Add post</a></div>';
}
foreach ($params['posts'] as $post) { ?>
    <div class="panel">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><?php echo $post->title?></h3>
            </div>
            <div class="modal-body">
                <?php echo $post->body?>
                <div class="row">
                    <hr/>
                    <div class="col-md-2">by <i><?php echo $post->author_email?></i></div>
                    <div class="col-md-2">added: <i><?php echo $post->add_date?></i></div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="/post/delete/<?php echo $post->id?>" class="btn btn-primary btn-sm">Delete</a>
                <a href="/post/edit/<?php echo $post->id?>" class="btn btn-primary btn-sm">Edit</a>
            </div>
        </div>
    </div>
<?php } ?>

</body>
</html>