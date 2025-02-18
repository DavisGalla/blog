<?php

require "Validator.php";

$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (!Validator::string($_POST["content"], max:  50)){

        $errors["content"] = "Saturam jābūt ievadītam, bet ne garākam par 50 rakstzīmēm";
        
    }   

    if (empty($errors)){

        $params = ["content" => $_POST["content"]];
        $sql = "INSERT INTO categories ( category_name) VALUES ( :content)";
        $posts = $db->query($sql, $params)->fetch();
        header("Location: /categories"); 

    }

}

require "views/categories/create.view.php";  