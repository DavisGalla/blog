<?php require "views/components/header.php" ?>
<?php require "views/components/navbar.php" ?>

    <h1><?= htmlspecialchars($post["category_name"]); ?></h1>

    

    <a href="/categories/edit?id=<?= $post["id"] ?>">edit</a>

    <form method="POST" action="/categories/delete">
    <input name = "id" value = <?= $post["id"] ?> type="hidden" /> 
    <input type="submit" value="Dzēst">
    </form>
    
    <?php require "views/components/footer.php" ?>