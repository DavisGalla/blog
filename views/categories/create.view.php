<?php require "views/components/header.php"; ?>
<?php require "views/components/navbar.php"; ?>

    <h1>Izveido bloga ievakstu</h1>

    <form method="POST">

        <label><input name="content"  value="<?= $_POST['content'] ?? "" ?>"/></label> 
        <button>Publicēt</button>

    </form>
        
    <?php if(isset($errors["content"])) { ?>
       <p><?=$errors["content"] ?></p>
     <?php } ?>

<?php require "views/components/footer.php" ?>