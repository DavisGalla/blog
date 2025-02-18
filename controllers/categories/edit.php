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

        $params = ["content" => $_POST["content"], "id" => $_POST["id"]];
        $sql = "UPDATE categories SET category_name = :content WHERE id = :id;";
        $posts = $db->query($sql, $params)->fetch();
        header("Location: /categories/show?id=".$_POST["id"]); 

    }

}


if (!isset($_GET['id']) || $_GET['id']==""){
    redirectIfNotFound();
}

$sql = "SELECT * FROM categories WHERE id = :id";
$params = ["id" => $_GET['id']];
$post = $db->query($sql, $params)->fetch();

if(!$post){
    redirectIfNotFound();   
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($errors)){
    $post['content'] = $_POST["content"];
}

require "views/categories/edit.view.php";  