<?php


if (!isset($_GET['id']) || $_GET['id']==""){
    redirectIfNotFound();
}
$sql = "SELECT * FROM categories
        WHERE id = :id ;";
$params = ["id" => $_GET['id']];
$post = $db->query($sql, $params)->fetch();

if(!$post){
    redirectIfNotFound();
}


require "views/categories/show.view.php";