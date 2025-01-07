<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class = "flex justify-center bg-gray-700">

<div >
<?php

require "function.php";
require "Database.php";
$config = require "config.php";

$db = new Database($config["database"]);
$select = "SELECT * FROM categories";
$params = [];
if (isset($_GET['search']) && $_GET['search']!=""){
    $search_query = "%". $_GET['search']. "%";
    $select .= " WHERE category_name LIKE :nosaukums";
    $params = ["nosaukums" => $search_query];
}

    $posts = $db->query($select, $params)->fetchAll();


 
echo "<h1 class='text-xl font-mono'>Kategorijas</h1>";

echo "<form class='m-3  .5'>";
echo "<input name='search' class='border-green-900 border-2 rounded bg-gray-700' />";
echo "<button class='border-2 border-gray-900 rounded px-0.5'>Meklēt</button>";
echo "</form>";

if (count($posts) == 0){
    echo " Nav atrsts";
}

echo "<ul>";
foreach($posts as $post){
    echo "<li>". $post["category_name"]. "</li>";
}
echo "</ul>";



?>
</div>

</body>
</html>