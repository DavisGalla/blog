<?php require "views/components/header.php"; ?>
<?php require "views/components/navbar.php"; ?>

    <h1>Izveido bloga ievakstu</h1>

    <form method="POST">

        <label><input name="content"  value="<?= $_POST['content'] ?? "" ?>"/></label> 
        <select name="category">
            <option value=""></option>
            <?php foreach($categories as $category){ ?>
            <option value = "<?= $category['id'] ?>"  ><?= htmlspecialchars($category["category_name"]) ?></option>
            <?php } ?>
        </select>
        <button>Publicēt</button>

    </form>
        
    <?php if(isset($errors["content"])) { ?>
       <p><?=$errors["content"] ?></p>
     <?php } ?>

<?php require "views/components/footer.php" ?>