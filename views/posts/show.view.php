<?php require "views/components/header.php" ?>
<?php require "views/components/navbar.php" ?>

    <h1><?= htmlspecialchars($post["content"]) ?></h1>
    <p>Kategorija: <?= htmlspecialchars($post["category_name"] ?? "Nav norādīta")  ?></p>

    <a href="edit?id=<?= $post["id"] ?>">edit</a>

    <form method="POST" action="/delete">
    <input name = "id" value = <?= $post["id"] ?> type="hidden" /> 
    <input type="submit" value="Dzēst">
    </form>
    <h1>Komentāri</h1>

    <?php if (count($posts) == 0){ ?>
        <p>Nav atrsts</p> 
    <?php } ?>


    <?php foreach($comments as $comment){ ?>
    <div>
        <p><?= $comment ?></p>
        <form action="comments/edit.php">
            <button>edit</button>
        </form>
    </div>
    <?php } ?>
    <?php require "views/components/footer.php" ?>