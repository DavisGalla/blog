<?php

require "Validator.php";

$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (!Validator::string($_POST["content"], max:  50)){

        $errors["content"] = "Saturam jābūt ievadītam, bet ne garākam par 50 rakstzīmēm";
        
    }   
    if (!Validator::number($_POST["category"], max:  50)){
        $errors["content"] = "Nepareizi izvēleta kategorija";

    }

    if (empty($errors)){

        $params = ["content" => $_POST["content"], "category" => $_POST["category"]];
        $sql = "INSERT INTO posts (content, category_id) VALUES (:content, :category)";
        $posts = $db->query($sql, $params)->fetch();
        header("Location: /"); 

    }

}


$sql2 = "SELECT * FROM categories ";
$params = [];
$categories = $db->query($sql2, $params)->fetchAll();

require "views/posts/create.view.php";  