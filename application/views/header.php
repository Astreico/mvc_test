<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adding Post</title>
    <link rel="stylesheet" href="../../vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/../vendor/twbs/bootstrap/dist/css/bootstrap-theme.min.css">
    <script src="/../../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
                <li><a href="/post/add">Add post</a></li>
            </ul>
        </div>
    </div>
</nav>
<?php
if(isset($params['errors'])) {
    echo '<div class="alert alert-danger" role="alert">';
    foreach($params['errors'] as $error) {
        echo '<p>', $error, '</p>';
    }
    echo '</div>';
}
?>
<?php
if(isset($params['success'])) {
    echo '<div class="alert alert-success" role="alert">', $params['success'], '</div>';
}
?>