<?php require "components/header.php"; ?>
<?php require "components/navbar.php"; ?>

    <h1>Blogs</h1>

    <form>
        <input name='search' value = "<?= $_GET['search'] ?? '';?>" />
        <button>Meklēt</button>
    </form>
    <?php if (count($posts) == 0){ ?>
        <p>Nav atrsts</p> 
    <?php } ?>

    <ul>
    <?php foreach($posts as $post){ ?>
        <li><?= $post["content"] ?></li>
    <?php } ?>
    </ul>

    <?php require "components/footer.php" ?>


