<?php

require "Validator.php";

if(!isset($_POST["id"])){
    redirectIfNotFound();
}

if(!Validator::number($_POST["id"])){
    $errors["content"] = "Šāda ieraksta neeksistē";
}   

if (empty($errors)){

    $params = ["id" => $_POST["id"]];
    $sql = "DELETE FROM categories WHERE id = :id;";
    $posts = $db->query($sql, $params)->fetch();
    header("Location: /categories"); 

}