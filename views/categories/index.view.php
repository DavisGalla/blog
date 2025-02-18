<?php require "views/components/header.php"; ?>
<?php require "views/components/navbar.php"; ?>



<div >
<h1>Kategorijas</h1>

<ul>
<?php foreach($posts as $post){ ?>
   <li><a href="/categories/show?id=<?= $post["id"] ?>"> <?= htmlspecialchars($post["category_name"]) ?></a></li>
<?php } ?>
</ul>

<a href="/categories/create">Izveidot Jaunu kategoriju</a>


</div>

<?php require "views/components/footer.php" ?>
