<?php require "views/components/header.php"; ?>
<?php require "views/components/navbar.php"; ?>

    <h1>Izveido bloga ievakstu</h1>

    <form method="POST">

        <label><input name="content"  value="<?= $post['category_name'] ?? "" ?>"/></label> 
        <button>Publicēt</button>
        <input name = "id" value = <?= $post["id"] ?> type="hidden" /> 

    </form>
        
    <?php if(isset($errors["content"])) { ?>
       <p><?=$errors["content"] ?></p>
     <?php } ?>

<?php require "views/components/footer.php" ?>