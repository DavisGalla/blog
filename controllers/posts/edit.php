<?php

require "Validator.php";

$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (!Validator::string($_POST["content"], max:  50)){

        $errors["content"] = "Saturam jābūt ievadītam, bet ne garākam par 50 rakstzīmēm";
        
    }
    if(!Validator::number($_POST["id"])){
        $errors["content"] = "Šāda ieraksta neeksistē";
    }   

    if (empty($errors)){

        $params = ["content" => $_POST["content"], "id" => $_POST["id"],  "category" => ($_POST["category"] === "") ? null : $_POST["category"]];
        $sql = "UPDATE posts SET content = :content, category_id = :category WHERE id = :id;";
        $posts = $db->query($sql, $params)->fetch();
        header("Location: /show?id=".$_POST["id"]); 

    }

}


if (!isset($_GET['id']) || $_GET['id']==""){
    redirectIfNotFound();
}

$sql = "SELECT * FROM posts WHERE id = :id";
$params = ["id" => $_GET['id']];
$post = $db->query($sql, $params)->fetch();

$sql2 = "SELECT * FROM categories ";
$params = [];
$categories = $db->query($sql2, $params)->fetchAll();

if(!$post){
    redirectIfNotFound();   
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($errors)){
    $post['content'] = $_POST["content"];
}

require "views/posts/edit.view.php";  