<?php


if (!isset($_GET['id']) || $_GET['id']==""){
    redirectIfNotFound();
}
$sql = "SELECT posts.*, categories.category_name FROM posts
        LEFT JOIN categories
        ON posts.category_id = categories.id
        WHERE posts.id = :id ;";
$params = ["id" => $_GET['id']];
$post = $db->query($sql, $params)->fetch();

$sql2 = "SELECT * FROM comments
        WHERE post_id = :id ;";
$params2 = ["id" => $_GET['id']];
$comments = $db->query($sql2, $params2)->fetchAll();


if(!$post){
    redirectIfNotFound();
}


require "views/posts/show.view.php";