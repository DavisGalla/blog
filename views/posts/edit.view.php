<?php require "views/components/header.php"; ?>
<?php require "views/components/navbar.php"; ?>

    <h1>Izveido bloga ievakstu</h1>

    <form method="POST">

        <label><input name="content"  value="<?= $post['content'] ?? "" ?>"/></label> 
        <select name="category">
            <option value="" <?php echo($post['category_id']=="null"?"selected" : "");?>></option>

            <?php foreach($categories as $category){ ?>
            <option value = "<?= $category['id'] ?>"  <?= $post['category_id']== $category['id'] ? "selected" : "" ?>  ><?= htmlspecialchars($category["category_name"]) ?></option>
            <?php } ?>
            
        </select>
        <button>Publicēt</button>
        <input name = "id" value = <?= $post["id"] ?> type="hidden" /> 

    </form>
        
    <?php if(isset($errors["content"])) { ?>
       <p><?=$errors["content"] ?></p>
     <?php } ?>

<?php require "views/components/footer.php" ?>